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
                'image' => 'images/laptop.png',
            ],
            [
                'name' => 'Laptop',
                'image' => 'images/laptop.png',
            ],
            [
                'name' => 'Aksesoris',
                'image' => 'images/laptop.png',
            ],
            [
                'name' => 'Desktop',
                'image' => 'images/laptop.png',
            ],
            [
                'name' => 'Komponen',
                'image' => 'images/laptop.png',
            ],
            [
                'name' => 'Networking',
                'image' => 'images/laptop.png',
            ],
        ];
    }
}
