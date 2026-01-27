<?php

namespace App\Http\Controllers;

use App\Models\Internship;
use Illuminate\Http\Request;

class InternshipController extends Controller
{
    public function index()
    {
        // Get the first record where type is 'batch'
        $batchImage = Internship::where('type', 'batch')->first();
        
        // Get all records where type is 'brochure'
        $brochureImages = Internship::where('type', 'brochure')->get();
        
        return view('pages.intern', compact('batchImage', 'brochureImages'));
    }
}