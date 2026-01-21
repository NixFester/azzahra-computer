<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ProductsController extends Controller
{
    public function getProducts(): array
    {
        // Get 20 random products from database with price > 0
        $dbProducts = DB::connection('sqlite')
            ->table('products')
            ->whereRaw("CAST(REPLACE(REPLACE(REPLACE(price, 'Rp', ''), '.', ''), ',', '') AS INTEGER) > 0")
            ->inRandomOrder()
            ->limit(20)
            ->get();

        $products = [];

        foreach ($dbProducts as $product) {
            // Generate random discount between 1-15%
            $discount = rand(1, 15);
            
            // Clean and convert price to number
            $originalPrice = (float) preg_replace('/[^0-9.]/', '', $product->price);
            
            // Skip if price is 0 or invalid (extra safety check)
            if ($originalPrice <= 0) {
                continue;
            }
            
            // Calculate new price after discount
            $newPrice = $originalPrice - ($originalPrice * $discount / 100);
            
            // Format prices
            $formattedOldPrice = 'Rp' . number_format($originalPrice, 0, ',', '.') . '.000,00';
            $formattedNewPrice = 'Rp' . number_format($newPrice, 0, ',', '.') . '.000,00';
            
            $products[] = [
                'image' => 'images/Nereus-AP1602-4.jpg',
                'category' => $product->category,
                'name' => $product->product_name,
                'price' => $formattedNewPrice,
                'badge' => $discount . '% OFF',
                'oldPrice' => $formattedOldPrice,
            ];
        }

        return $products;
    }

    public function getTabs(): array
    {
        return ['Power Deals', 'New Arrival', 'Top Rate', 'Best Selling'];
    }
}