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
                'image' => 'images/kategori/Axioo Slimbook Hype 10 W11 BROWN.jpg',
            ],
            [
                'name' => 'Aksesoris',
                'image' => 'images/kategori/accesories.jpg',
            ],
            [
                'name' => 'handphone',
                'image' => 'images/kategori/hp.jpg',
            ],
            [
                'name' => 'tablet',
                'image' => 'images/kategori/tablet.jpg',
            ],
            [
                'name' => 'watch',
                'image' => 'images/kategori/Watch S10 42mm.jpg',
            ],
            [
                'name' => 'audio',
                'image' => 'images/kategori/tws.jpg',
            ]
        ];
    }
}
