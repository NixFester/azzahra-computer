<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;

class NewProductCollection extends Component
{
    public $categories;
    public $products;

    public function __construct($searchCategories = null)
    {
        // Transform search categories into proper format
        if ($searchCategories) {
            $this->categories = $this->transformCategories($searchCategories);
        } else {
            $this->categories = $this->getDefaultCategories();
        }

        // Get products - ensure it's always an array
        $this->products = $this->getProducts() ?? [];
    }

    private function getDefaultCategories()
    {
        return [
            (object)['name' => 'All', 'slug' => null],
            (object)['name' => 'Rolex', 'slug' => 'rolex'],
            (object)['name' => 'Patek Philippe', 'slug' => 'patek-philippe'],
            (object)['name' => 'Audemars Piguet', 'slug' => 'audemars-piguet'],
            (object)['name' => 'Vacheron Constantin', 'slug' => 'vacheron-constantin'],
            (object)['name' => 'Jaeger-LeCoultre', 'slug' => 'jaeger-lecoultre'],
            (object)['name' => 'Omega', 'slug' => 'omega'],
        ];
    }

    private function transformCategories($searchCategories)
    {
        $categories = [];
        
        foreach ($searchCategories as $key => $value) {
            // Handle if it's a simple array of strings
            if (is_string($value)) {
                $categories[] = (object)[
                    'name' => $value,
                    'slug' => strtolower(str_replace(' ', '-', $value))
                ];
            }
            // Handle if it's already an array with name/slug
            elseif (is_array($value)) {
                $categories[] = (object)[
                    'name' => $value['name'] ?? $value,
                    'slug' => $value['slug'] ?? strtolower(str_replace(' ', '-', $value['name'] ?? $value))
                ];
            }
            // Handle if it's already an object
            elseif (is_object($value)) {
                $categories[] = $value;
            }
        }
        
        return $categories;
    }

    private function getProducts()
    {
        $products = [];
        
        // Query products from database
        $productQuery = DB::table('products')
            ->select('id', 'product_name', 'image', 'category')
            ->limit(16)
            ->get();

        foreach ($productQuery as $product) {
            $imageUrl = $this->formatImageUrl($product);
            $products[] = [
                'id' => $product->id,
                'image' => $imageUrl,
                'name' => $product->product_name,
            ];
        }

        return $products;
    }

    private function formatImageUrl($product)
    {
        // Format image URL logic
        if (!empty($product->image)) {
            return asset('storage/' . $product->image);
        }
        return asset('images/placeholder.jpg');
    }

    public function render()
    {
        return view('components.new-product-collection');
    }
}