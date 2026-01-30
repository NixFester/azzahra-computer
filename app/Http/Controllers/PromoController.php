<?php

namespace App\Http\Controllers;

use App\Models\Iklan;

class PromoController extends Controller
{
    public function index()
    {
        // Get all records where type is 'promo'
        $promoImages = Iklan::where('type', 'promo')->get();

        return view('pages.promo', compact('promoImages'));
    }
}
