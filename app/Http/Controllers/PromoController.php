<?php
namespace App\Http\Controllers;
use App\Models\Iklan;
use Illuminate\Http\Request;

class PromoController extends Controller
{
    public function index()
    {
        // Get all records where type is 'promo'
        $promoImages = Iklan::where('type', 'promo')->get();
        
        return view('pages.promo', compact('promoImages'));
    }
}