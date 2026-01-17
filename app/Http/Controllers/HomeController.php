<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Nanti bisa diganti dengan data dari database
        $products = []; // Data produk
        $brands = [];   // Data brand
        $reviews = [];  // Data review
        
        return view('home', compact('products', 'brands', 'reviews'));
    }
}