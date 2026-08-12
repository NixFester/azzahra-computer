<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Xendit\Configuration;
use Xendit\Invoice\CreateInvoiceRequest;
use Xendit\Invoice\InvoiceApi;

class XenditController extends Controller
{
    protected InvoiceApi $invoiceApi;

    public function __construct()
    {
        Configuration::setXenditKey(config('services.xendit.secret_key'));
        $this->invoiceApi = new InvoiceApi();
    }

    /**
     * Create a Xendit invoice and redirect customer to payment page.
     */
    public function checkout(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer|exists:products,id',
            'buyer_name' => 'required|string|max:255',
            'buyer_email' => 'required|email|max:255',
            'buyer_phone' => 'nullable|string|max:20',
        ]);

        // Fetch product
        $product = DB::table('products')->where('id', $request->product_id)->first();

        if (! $product) {
            return back()->with('error', 'Produk tidak ditemukan.');
        }

        // Parse price — if stored in thousands (e.g. 5500), convert to 5,500,000 IDR
        $rawPrice = (float) preg_replace('/[^0-9.]/', '', $product->price);
        $amount = ($rawPrice > 0 && $rawPrice < 100000) ? ($rawPrice * 1000) : $rawPrice;

        if ($amount < 10000) {
            return back()->with('error', 'Harga produk tidak valid untuk pembayaran Xendit (minimal Rp 10.000).');
        }

        // Generate unique external ID
        $externalId = 'ORD-' . now()->format('Ymd-His') . '-' . Str::random(6);

        // Create order record
        $order = Order::create([
            'external_id' => $externalId,
            'product_id' => $product->id,
            'product_name' => $product->product_name,
            'amount' => $amount,
            'buyer_name' => trim($request->buyer_name),
            'buyer_email' => trim($request->buyer_email),
            'buyer_phone' => trim($request->buyer_phone ?? ''),
            'status' => 'pending',
        ]);

        // Build customer array without empty strings (Xendit rejects empty mobile_number string)
        $customerData = [
            'given_names' => trim($request->buyer_name),
            'email' => trim($request->buyer_email),
        ];

        if (! empty($request->buyer_phone)) {
            $customerData['mobile_number'] = trim($request->buyer_phone);
        }

        try {
            $invoiceRequest = new CreateInvoiceRequest([
                'external_id' => $externalId,
                'amount' => $amount,
                'payer_email' => trim($request->buyer_email),
                'description' => "Pembelian {$product->product_name} — Azzahra Computer",
                'customer' => $customerData,
                'success_redirect_url' => route('payment.success', $order->id),
                'failure_redirect_url' => route('payment.failed', $order->id),
                'currency' => 'IDR',
                'invoice_duration' => 86400, // 24 hours
                'locale' => 'id',
            ]);

            $invoice = $this->invoiceApi->createInvoice($invoiceRequest);

            // Update order with Xendit invoice details
            $order->update([
                'xendit_invoice_id' => $invoice->getId(),
                'xendit_invoice_url' => $invoice->getInvoiceUrl(),
            ]);

            return redirect($invoice->getInvoiceUrl());
        } catch (\Xendit\XenditRestException $e) {
            Log::error('Xendit REST API error', [
                'order_id' => $order->id,
                'message' => $e->getMessage(),
                'full_error' => $e->getFullError(),
            ]);

            $order->update(['status' => 'failed']);

            return back()->with('error', 'Gagal membuat invoice Xendit: ' . $e->getMessage());
        } catch (\Exception $e) {
            Log::error('Xendit invoice creation failed', [
                'order_id' => $order->id,
                'error' => $e->getMessage(),
            ]);

            $order->update(['status' => 'failed']);

            return back()->with('error', 'Gagal membuat invoice pembayaran. Silakan coba lagi.');
        }
    }

    /**
     * Handle Xendit webhook callback.
     */
    public function webhook(Request $request)
    {
        // Verify callback token
        $callbackToken = $request->header('x-callback-token');
        $expectedToken = config('services.xendit.webhook_token');

        if ($expectedToken && $callbackToken !== $expectedToken) {
            Log::warning('Xendit webhook: invalid callback token', [
                'received' => $callbackToken,
            ]);
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $payload = $request->all();
        $externalId = $payload['external_id'] ?? null;
        $status = $payload['status'] ?? null;

        if (! $externalId) {
            return response()->json(['error' => 'Missing external_id'], 400);
        }

        $order = Order::where('external_id', $externalId)->first();

        if (! $order) {
            Log::warning('Xendit webhook: order not found', ['external_id' => $externalId]);
            return response()->json(['error' => 'Order not found'], 404);
        }

        Log::info('Xendit webhook received', [
            'external_id' => $externalId,
            'status' => $status,
            'order_id' => $order->id,
        ]);

        switch (strtoupper($status)) {
            case 'PAID':
            case 'SETTLED':
                $order->update([
                    'status' => 'paid',
                    'paid_at' => now(),
                ]);
                break;

            case 'EXPIRED':
                $order->update(['status' => 'expired']);
                break;

            default:
                Log::info('Xendit webhook: unhandled status', ['status' => $status]);
                break;
        }

        return response()->json(['message' => 'OK']);
    }

    /**
     * Payment success page.
     */
    public function success(Order $order)
    {
        return view('payment.success', compact('order'));
    }

    /**
     * Payment failed/expired page.
     */
    public function failed(Order $order)
    {
        return view('payment.failed', compact('order'));
    }
}
