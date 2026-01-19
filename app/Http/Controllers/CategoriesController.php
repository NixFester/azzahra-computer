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
                'image' => 'images/kategori/laptop.png',
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
                'image' => 'images/kategori/hp.png',
            ],
            [
                'name' => 'watch',
                'image' => 'images/kategori/laptop.png',
            ],
            [
                'name' => 'audio',
                'image' => 'images/kategori/tws.png',
            ]
        ];
    }
}
