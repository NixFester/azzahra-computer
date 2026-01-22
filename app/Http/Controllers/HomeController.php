<?php

namespace App\Http\Controllers;

use App\Models\Iklan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch banners from iklan table where type is 'banner' and is_active is true
        $banners = Iklan::where('type', 'banner')
                        ->where('is_active', true)
                        ->orderBy('order')
                        ->get();
        
        $products = []; // Data produk
        $brands = [];   // Data brand
        $reviews = [];  // Data review
        
        return view('home', compact('products', 'brands', 'reviews', 'banners'));
    }
}