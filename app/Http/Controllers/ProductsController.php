<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        $productsData = $this->getProductsWithPagination($request);
        $tabs = $this->getTabs();
        $searchCategories = $this->getCategories();

        return view('products', [
            'products' => $productsData['products'],
            'pagination' => $productsData['pagination'],
            'tabs' => $tabs,
            'searchCategories' => $searchCategories
        ]);
    }

    public function getProductsWithPagination(Request $request): array
    {
        // Get search query and category from request
        $search = $request->input('search', '');
        $category = $request->input('category', '');
        $minPrice = $request->input('min_price', 0);
        $maxPrice = $request->input('max_price', 50000000);
        $page = $request->input('page', 1);
        $perPage = 12; // 4 columns x 3 rows

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

        // Get total count for pagination
        $totalProducts = $query->count();

        // Calculate pagination values
        $totalPages = ceil($totalProducts / $perPage);
        $currentPage = max(1, min($page, $totalPages));
        $offset = ($currentPage - 1) * $perPage;

        // Get paginated products
        $dbProducts = $query->offset($offset)->limit($perPage)->get();

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

        // Build pagination data
        $pagination = [
            'current_page' => $currentPage,
            'last_page' => $totalPages,
            'per_page' => $perPage,
            'total' => $totalProducts,
            'from' => $totalProducts > 0 ? ($offset + 1) : 0,
            'to' => min($offset + count($products), $totalProducts),
            'first_url' => $this->buildUrlWithParams($request, 1),
            'last_url' => $this->buildUrlWithParams($request, $totalPages),
            'prev_url' => $currentPage > 1 ? $this->buildUrlWithParams($request, $currentPage - 1) : null,
            'next_url' => $currentPage < $totalPages ? $this->buildUrlWithParams($request, $currentPage + 1) : null,
            'links' => $this->buildPaginationLinks($request, $currentPage, $totalPages),
        ];

        return [
            'products' => $products,
            'pagination' => $pagination
        ];
    }

    private function buildUrlWithParams(Request $request, int $page): string
    {
        $queryParams = $request->query();
        $queryParams['page'] = $page;
        return url()->current() . '?' . http_build_query($queryParams);
    }

    private function buildPaginationLinks(Request $request, int $currentPage, int $totalPages): array
    {
        $links = [];
        
        // Determine range of pages to display
        $rangeStart = max(1, $currentPage - 2);
        $rangeEnd = min($totalPages, $currentPage + 2);

        // Add first page if needed
        if ($rangeStart > 1) {
            $links[] = [
                'url' => $this->buildUrlWithParams($request, 1),
                'label' => '1',
                'active' => false,
            ];
            if ($rangeStart > 2) {
                $links[] = [
                    'url' => null,
                    'label' => '...',
                    'active' => false,
                ];
            }
        }

        // Add page range
        for ($i = $rangeStart; $i <= $rangeEnd; $i++) {
            $links[] = [
                'url' => $this->buildUrlWithParams($request, $i),
                'label' => (string) $i,
                'active' => $i === $currentPage,
            ];
        }

        // Add last page if needed
        if ($rangeEnd < $totalPages) {
            if ($rangeEnd < $totalPages - 1) {
                $links[] = [
                    'url' => null,
                    'label' => '...',
                    'active' => false,
                ];
            }
            $links[] = [
                'url' => $this->buildUrlWithParams($request, $totalPages),
                'label' => (string) $totalPages,
                'active' => false,
            ];
        }

        return $links;
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