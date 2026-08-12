@extends('layouts.app')

@section('title', 'Pembayaran Berhasil — Azzahra Computer')

@section('content')
    <div class="payment-result-page">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8">
                    <div class="result-card success-card">
                        {{-- Success Icon --}}
                        <div class="result-icon-wrap">
                            <div class="result-icon success-icon">
                                <svg width="48" height="48" fill="none" stroke="currentColor" stroke-width="2.5"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <div class="pulse-ring"></div>
                        </div>

                        <h1 class="result-title">Pembayaran Berhasil!</h1>
                        <p class="result-subtitle">Terima kasih atas pembelian Anda di Azzahra Computer</p>

                        {{-- Order Summary --}}
                        <div class="order-summary">
                            <div class="summary-row">
                                <span class="summary-label">ID Pesanan</span>
                                <span class="summary-value">{{ $order->external_id }}</span>
                            </div>
                            <div class="summary-divider"></div>
                            <div class="summary-row">
                                <span class="summary-label">Produk</span>
                                <span class="summary-value">{{ $order->product_name }}</span>
                            </div>
                            <div class="summary-divider"></div>
                            <div class="summary-row">
                                <span class="summary-label">Total Bayar</span>
                                <span class="summary-value amount">Rp{{ number_format($order->amount, 0, ',', '.') }}</span>
                            </div>
                            <div class="summary-divider"></div>
                            <div class="summary-row">
                                <span class="summary-label">Status</span>
                                <span class="status-badge status-paid">
                                    <i class="bi bi-check-circle-fill me-1"></i>
                                    {{ $order->isPaid() ? 'Lunas' : 'Menunggu Konfirmasi' }}
                                </span>
                            </div>
                            @if($order->paid_at)
                                <div class="summary-divider"></div>
                                <div class="summary-row">
                                    <span class="summary-label">Waktu Bayar</span>
                                    <span class="summary-value">{{ $order->paid_at->format('d M Y, H:i') }} WIB</span>
                                </div>
                            @endif
                        </div>

                        {{-- Contact Info --}}
                        <div class="contact-note">
                            <i class="bi bi-info-circle me-2"></i>
                            Konfirmasi pesanan akan dikirim ke <strong>{{ $order->buyer_email }}</strong>.
                            Hubungi kami jika ada pertanyaan.
                        </div>

                        {{-- Actions --}}
                        <div class="result-actions">
                            <a href="{{ route('products') }}" class="btn-result btn-primary-result">
                                <i class="bi bi-grid me-2"></i>Lihat Produk Lainnya
                            </a>
                            <a href="{{ route('home') }}" class="btn-result btn-outline-result">
                                <i class="bi bi-house me-2"></i>Kembali ke Beranda
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .payment-result-page {
            min-height: 100vh;
            background: linear-gradient(135deg, #f0fdf4 0%, #ecfdf5 50%, #f0fdf4 100%);
            display: flex;
            align-items: center;
        }

        .result-card {
            background: white;
            border-radius: 24px;
            padding: 48px 40px;
            text-align: center;
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.06), 0 1px 4px rgba(0, 0, 0, 0.04);
            animation: slideUp 0.6s cubic-bezier(0.16, 1, 0.3, 1);
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .result-icon-wrap {
            position: relative;
            display: inline-block;
            margin-bottom: 24px;
        }

        .result-icon {
            width: 88px;
            height: 88px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            z-index: 2;
        }

        .success-icon {
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
            animation: popIn 0.5s cubic-bezier(0.34, 1.56, 0.64, 1) 0.2s both;
        }

        @keyframes popIn {
            from {
                transform: scale(0);
                opacity: 0;
            }
            to {
                transform: scale(1);
                opacity: 1;
            }
        }

        .pulse-ring {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 88px;
            height: 88px;
            border-radius: 50%;
            transform: translate(-50%, -50%);
            animation: pulse 2s ease-out infinite;
        }

        .success-card .pulse-ring {
            border: 3px solid #10b981;
        }

        @keyframes pulse {
            0% {
                transform: translate(-50%, -50%) scale(1);
                opacity: 0.6;
            }
            100% {
                transform: translate(-50%, -50%) scale(1.6);
                opacity: 0;
            }
        }

        .result-title {
            font-size: 1.75rem;
            font-weight: 800;
            color: #111827;
            margin-bottom: 8px;
            letter-spacing: -0.02em;
        }

        .result-subtitle {
            color: #6b7280;
            font-size: 1rem;
            margin-bottom: 32px;
        }

        .order-summary {
            background: #f9fafb;
            border-radius: 16px;
            padding: 24px;
            text-align: left;
            margin-bottom: 24px;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 8px 0;
        }

        .summary-label {
            color: #6b7280;
            font-size: 0.875rem;
        }

        .summary-value {
            color: #111827;
            font-weight: 600;
            font-size: 0.875rem;
            text-align: right;
            max-width: 60%;
            word-break: break-word;
        }

        .summary-value.amount {
            color: #059669;
            font-size: 1rem;
            font-weight: 700;
        }

        .summary-divider {
            height: 1px;
            background: #e5e7eb;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .status-paid {
            background: #d1fae5;
            color: #065f46;
        }

        .contact-note {
            background: #eff6ff;
            border-radius: 12px;
            padding: 16px;
            font-size: 0.85rem;
            color: #1e40af;
            text-align: left;
            margin-bottom: 28px;
        }

        .result-actions {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .btn-result {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 14px 24px;
            border-radius: 14px;
            font-weight: 600;
            font-size: 0.95rem;
            text-decoration: none;
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
            border: none;
        }

        .btn-primary-result {
            background: linear-gradient(135deg, #120263, #1e0590);
            color: white;
        }

        .btn-primary-result:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(18, 2, 99, 0.3);
            color: white;
        }

        .btn-outline-result {
            background: transparent;
            color: #374151;
            border: 2px solid #e5e7eb;
        }

        .btn-outline-result:hover {
            background: #f9fafb;
            border-color: #d1d5db;
            color: #111827;
        }

        @media (max-width: 575px) {
            .result-card {
                padding: 32px 24px;
                border-radius: 20px;
            }

            .result-title {
                font-size: 1.4rem;
            }
        }
    </style>
@endsection
