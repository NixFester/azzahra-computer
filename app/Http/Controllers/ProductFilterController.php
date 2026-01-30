<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductFilterController extends Controller
{
    public function index()
    {
        // Get unique categories from products table
        $categories = DB::table('products')
            ->select('category')
            ->distinct()
            ->whereNotNull('category')
            ->orderBy('category')
            ->pluck('category');

        // Get unique brands from products table
        $brands = DB::table('products')
            ->select('brand')
            ->distinct()
            ->whereNotNull('brand')
            ->orderBy('brand')
            ->pluck('brand');

        return view('products.filter', compact('categories', 'brands'));
    }

    public function filter(Request $request)
    {
        $query = DB::table('products');

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        if ($request->filled('brand')) {
            $query->where('brand', $request->brand);
        }

        $products = $query->get();

        $categories = DB::table('products')
            ->select('category')
            ->distinct()
            ->whereNotNull('category')
            ->orderBy('category')
            ->pluck('category');

        $brands = DB::table('products')
            ->select('brand')
            ->distinct()
            ->whereNotNull('brand')
            ->orderBy('brand')
            ->pluck('brand');

        return view('products.filter', compact('categories', 'brands', 'products'));
    }
}
