<?php

// app/Http/Controllers/NavigationController.php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class NavigationController extends Controller
{
    public function __construct()
    {
        // Share navigation data with all views
        View::composer('*', function ($view) {
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

            $view->with([
                'navCategories' => $categories,
                'navBrands' => $brands,
            ]);
        });
    }
}
