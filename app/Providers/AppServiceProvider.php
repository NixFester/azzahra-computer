<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Share navigation data with all views
        View::composer('*', function ($view) {
            $searchCategories = DB::table('products')
                ->select('category')
                ->distinct()
                ->whereNotNull('category')
                ->orderBy('category')
                ->pluck('category');

            $searchCategoriesArray = $searchCategories ? $searchCategories->toArray() : [];

            $brands = DB::table('products')
                ->select('brand')
                ->distinct()
                ->whereNotNull('brand')
                ->orderBy('brand')
                ->pluck('brand');

            $view->with([
                'searchCategories' => $searchCategoriesArray,
                'navCategories' => $searchCategoriesArray,
                'navBrands' => $brands
            ]);
        });
    }
}
