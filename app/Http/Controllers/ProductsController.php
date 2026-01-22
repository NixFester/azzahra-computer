<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        $products = $this->getProducts($request);
        $tabs = $this->getTabs();
        $searchCategories = $this->getCategories();

        return view('products', [
            'products' => $products,
            'tabs' => $tabs,
            'searchCategories' => $searchCategories
        ]);
    }

    public function getProducts(Request $request): array
    {
        // Get search query and category from request
        $search = $request->input('search', '');
        $category = $request->input('category', '');
        $minPrice = $request->input('min_price', 0);
        $maxPrice = $request->input('max_price', 50000000);

        // Build query
        $query = DB::connection('sqlite')->table('products');

        // Search by product name
        if (!empty($search)) {
            $query->where('product_name', 'like', '%' . $search . '%');
        }

        // Filter by category (case-insensitive)
        if (!empty($category)) {
            $query->whereRaw('LOWER(category) = ?', [strtolower($category)]);
        }

        // Get products
        $dbProducts = $query->limit(20)->get();

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

    public function getCategories(): array
    {
        // Get all unique categories from products table
        $categories = DB::connection('sqlite')
            ->table('products')
            ->whereNotNull('category')
            ->distinct()
            ->pluck('category')
            ->toArray();

        return $categories;
    }

    public function getTabs(): array
    {
        return ['Power Deals', 'New Arrival', 'Top Rate', 'Best Selling'];
    }

    public function getFeaturedProducts(): array
    {
        // Get featured products for home page without filters
        $request = new Request();
        return $this->getProducts($request);
    }
}