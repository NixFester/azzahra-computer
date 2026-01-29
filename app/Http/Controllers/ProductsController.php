<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
            'searchCategories' => $searchCategories,
        ]);
    }

    public function getProductsWithPagination(Request $request): array
    {
        // Get search query and category from request
        $search = $request->input('search', '');
        $category = $request->input('category', '');
        $minPrice = $request->input('min_price', null);
        $maxPrice = $request->input('max_price', null);
        $sort = $request->input('sort', '');
        $page = $request->input('page', 1);
        $perPage = 12; // 4 columns x 3 rows

        $minPrice = $minPrice !== null ? $minPrice / 1000 : null;
        $maxPrice = $maxPrice !== null ? $maxPrice / 1000 : null;

        // Build query
        $query = DB::table('products');

        // Search by product name
        if (! empty($search)) {
            $query->where('product_name', 'like', '%'.$search.'%');
        }

        // Filter by category (case-insensitive)
        if (! empty($category)) {
            $query->whereRaw('LOWER(category) = ?', [strtolower($category)]);
        }

        // Filter by price range
        // Handle both numeric and formatted prices (Rp, commas, etc.)
        if ($minPrice !== null && $minPrice !== '') {
            // Try to cast price as numeric for comparison
            $query->whereRaw('CAST(REPLACE(REPLACE(REPLACE(price, "Rp", ""), ".", ""), ",", "") AS INTEGER) >= ?', [(int) $minPrice]);
        }

        if ($maxPrice !== null && $maxPrice !== '') {
            $query->whereRaw('CAST(REPLACE(REPLACE(REPLACE(price, "Rp", ""), ".", ""), ",", "") AS INTEGER) <= ?', [(int) $maxPrice]);
        }

        // Apply sorting
        switch ($sort) {
            case 'name_asc':
                $query->orderBy('product_name', 'asc');
                break;
            case 'name_desc':
                $query->orderBy('product_name', 'desc');
                break;
            case 'price_asc':
                $query->orderByRaw('CAST(REPLACE(REPLACE(REPLACE(price, "Rp", ""), ".", ""), ",", "") AS INTEGER) ASC');
                break;
            case 'price_desc':
                $query->orderByRaw('CAST(REPLACE(REPLACE(REPLACE(price, "Rp", ""), ".", ""), ",", "") AS INTEGER) DESC');
                break;
            default:
                // Default sorting by id
                $query->orderBy('id', 'desc');
                break;
        }

        // Get total count for pagination
        $totalProducts = $query->count();

        // Calculate pagination values
        $totalPages = ceil($totalProducts / $perPage);
        $currentPage = max(1, min($page, $totalPages ?: 1));
        $offset = ($currentPage - 1) * $perPage;

        // Get paginated products
        $dbProducts = $query->offset($offset)->limit($perPage)->get();

        $products = [];

        foreach ($dbProducts as $product) {
            // Generate random discount between 1-15%
            $discount = 0;

            // Clean and convert price to number
            $originalPrice = (float) preg_replace('/[^0-9.]/', '', $product->price);

            // Skip if price is 0 or invalid (extra safety check)
            if ($originalPrice <= 0) {
                continue;
            }

            // Calculate new price after discount
            $newPrice = $originalPrice - ($originalPrice * $discount / 100);

            // Format prices
            $formattedOldPrice = 'Rp'.number_format($originalPrice, 0, ',', '.').'.000,00';
            $formattedNewPrice = 'Rp'.number_format($newPrice, 0, ',', '.').'.000,00';

            // Build image URL with cache-busting timestamp
            $imageUrl = $this->formatImageUrl($product);

            $products[] = [
                'id' => $product->id,
                'image' => $imageUrl,
                'category' => $product->category,
                'name' => $product->product_name,
                'price' => $formattedNewPrice,
                'badge' => $discount.'% OFF',
                'oldPrice' => $formattedOldPrice,
            ];
        }

        // Build pagination data
        $pagination = [
            'current_page' => $currentPage,
            'last_page' => $totalPages ?: 1,
            'per_page' => $perPage,
            'total' => $totalProducts,
            'from' => $totalProducts > 0 ? ($offset + 1) : 0,
            'to' => min($offset + count($products), $totalProducts),
            'first_url' => $this->buildUrlWithParams($request, 1),
            'last_url' => $this->buildUrlWithParams($request, $totalPages ?: 1),
            'prev_url' => $currentPage > 1 ? $this->buildUrlWithParams($request, $currentPage - 1) : null,
            'next_url' => $currentPage < $totalPages ? $this->buildUrlWithParams($request, $currentPage + 1) : null,
            'links' => $this->buildPaginationLinks($request, $currentPage, $totalPages ?: 1),
        ];

        return [
            'products' => $products,
            'pagination' => $pagination,
        ];
    }

    private function buildUrlWithParams(Request $request, int $page): string
    {
        $queryParams = $request->query();
        $queryParams['page'] = $page;

        return url()->current().'?'.http_build_query($queryParams);
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
        $query = DB::table('products');

        // Search by product name
        if (! empty($search)) {
            $query->where('product_name', 'like', '%'.$search.'%');
        }

        // Filter by category (case-insensitive)
        if (! empty($category)) {
            $query->whereRaw('LOWER(category) = ?', [strtolower($category)]);
        }

        // Filter by price range
        $query->whereRaw('CAST(REPLACE(REPLACE(price, "Rp", ""), ",", "") AS REAL) >= ?', [$minPrice]);
        $query->whereRaw('CAST(REPLACE(REPLACE(price, "Rp", ""), ",", "") AS REAL) <= ?', [$maxPrice]);

        // Get products
        $dbProducts = $query->limit(20)->get();

        $products = [];

        foreach ($dbProducts as $product) {
            // Generate random discount between 1-15%
            $discount = 0;

            // Clean and convert price to number
            $originalPrice = (float) preg_replace('/[^0-9.]/', '', $product->price);

            // Skip if price is 0 or invalid (extra safety check)
            if ($originalPrice <= 0) {
                continue;
            }

            // Calculate new price after discount
            $newPrice = $originalPrice - ($originalPrice * $discount / 100);

            // Format prices
            $formattedOldPrice = 'Rp'.number_format($originalPrice, 0, ',', '.').'.000,00';
            $formattedNewPrice = 'Rp'.number_format($newPrice, 0, ',', '.').'.000,00';

            // Build image URL with cache-busting timestamp
            $imageUrl = $this->formatImageUrl($product);

            $products[] = [
                'id' => $product->id,
                'image' => $imageUrl,
                'category' => $product->category,
                'name' => $product->product_name,
                'price' => $formattedNewPrice,
                'badge' => $discount.'% OFF',
                'oldPrice' => $formattedOldPrice,
            ];
        }

        return $products;
    }

    public function getCategories(): array
    {
        // Get all unique categories from products table
        $categories = DB::table('products')
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
        $request = new Request;

        // Clone base query logic from getProducts, but add random order
        $dbProducts = DB::query()
            ->fromSub(function ($q) {
                $q->from('products')
                    ->select('*')
                    ->selectRaw('ROW_NUMBER() OVER (PARTITION BY category ORDER BY id) as rn');
            }, 't')
            ->where('rn', '<=', 20)
            ->get();

        $products = [];

        foreach ($dbProducts as $product) {
            $discount = 0;
            $originalPrice = (float) preg_replace('/[^0-9.]/', '', $product->price);

            if ($originalPrice <= 0) {
                continue;
            }

            $newPrice = $originalPrice - ($originalPrice * $discount / 100);

            // Build image URL with cache-busting timestamp
            $imageUrl = $this->formatImageUrl($product);

            $products[] = [
                'id' => $product->id,
                'image' => $imageUrl,
                'category' => $product->category,
                'name' => $product->product_name,
                'price' => 'Rp'.number_format($newPrice, 0, ',', '.').'.000,00',
                'badge' => $discount.'% OFF',
                'oldPrice' => 'Rp'.number_format($originalPrice, 0, ',', '.').'.000,00',
            ];
        }

        return $products;
    }

    public function getNewProducts(): array
    {
        $products = [];

        // Query products from database - get latest 16 products
        $dbProducts = DB::table('products')
            ->orderBy('id', 'desc') // Get newest products first
            ->limit(16)->get();

        foreach ($dbProducts as $product) {
            $imageUrl = $this->formatImageUrl($product);
            $products[] = [
                'id' => $product->id,
                'image' => $imageUrl,
                'name' => $product->product_name,
            ];
        }

        return $products;
    }

    public function getProductDetails(int $productId): ?array
    {
        // Get product from database
        $product = DB::table('products')
            ->where('id', $productId)
            ->first()
            ->get();

        if (! $product) {
            return null;
        }

        // Generate random discount between 1-15%
        $discount = 0;

        // Clean and convert price to number
        $originalPrice = (float) preg_replace('/[^0-9.]/', '', $product->price);

        // Skip if price is 0 or invalid
        if ($originalPrice <= 0) {
            return null;
        }

        // Calculate new price after discount
        $newPrice = $originalPrice - ($originalPrice * $discount / 100);

        // Format prices
        $formattedOldPrice = 'Rp'.number_format($originalPrice, 0, ',', '.').'.000,00';
        $formattedNewPrice = 'Rp'.number_format($newPrice, 0, ',', '.').'.000,00';

        // Build image URL
        $imageUrl = $this->formatImageUrl($product);

        // Parse specs if available
        $specs = [];
        if (! empty($product->specs)) {
            // Assuming specs is stored as JSON or comma-separated
            $specs = json_decode($product->specs, true) ?? explode(',', $product->specs);
        }

        return [
            'id' => $product->id,
            'image' => $imageUrl,
            'category' => $product->category,
            'name' => $product->product_name,
            'brand' => $product->brand,
            'price' => $formattedNewPrice,
            'badge' => $discount.'% OFF',
            'oldPrice' => $formattedOldPrice,
            'specs' => $specs,
        ];
    }

    /**
     * Show product detail page
     */
    public function show(Request $request, int $id)
    {
        $product = $this->getProductDetails($id);

        if (! $product) {
            abort(404, 'Product not found');
        }

        // Get categories for navigation
        $navCategories = DB::table('products')
            ->select('category')
            ->distinct()
            ->pluck('category')
            ->toArray();

        return view('products.detail', [
            'product' => $product,
            'navCategories' => $navCategories,
        ]);
    }

    /**
     * Format image URL with cache-busting parameter
     *
     * @param  object  $product
     */
    private function formatImageUrl($product): string
    {
        // If product has image stored in public disk
        if (! empty($product->image_array)) {
            $imageUrl = Storage::url($product->image_array);
        } else {
            // Use fallback image based on category
            $imageUrl = asset('images/kategori/'.$product->category.'/'.rand(1, 4).'.jpg');
        }

        // Add timestamp for cache-busting if product has updated_at
        if (! empty($product->updated_at)) {
            $timestamp = strtotime($product->updated_at);
            $imageUrl .= '?v='.$timestamp;
        }

        return $imageUrl;
    }
}
