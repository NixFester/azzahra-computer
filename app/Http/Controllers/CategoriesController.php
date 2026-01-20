<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class CategoriesController extends Controller
{
    public function getCategories(): array
    {
        return [
            [
                'name' => 'Laptop',
                'image' => 'images/kategori/Axioo Slimbook Hype 10 W11 BROWN.png',
            ],
            [
                'name' => 'Aksesoris',
                'image' => 'images/kategori/accesories.png',
            ],
            [
                'name' => 'handphone',
                'image' => 'images/kategori/hp.png',
            ],
            [
                'name' => 'tablet',
                'image' => 'images/kategori/tablet.png',
            ],
            [
                'name' => 'watch',
                'image' => 'images/kategori/Watch S10 42mm.png',
            ],
            [
                'name' => 'audio',
                'image' => 'images/kategori/tws.png',
            ]
        ];
    }
}
