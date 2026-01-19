<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class ProductsController extends Controller
{
    public function getProducts(): array
    {
        return [
            [
                'image' => 'images/Nereus-AP1602-4.jpg',
                'category' => 'Backpack',
                'name' => 'Asus Nereus AP1602 Backpack',
                'price' => 'Rp299.000,00',
                'badge' => '5% OFF',
                'oldPrice' => 'Rp314.000,00',
            ],
            [
                'image' => 'images/Nereus-AP1602-4.jpg',
                'category' => 'Backpack',
                'name' => 'Asus Nereus AP1602 Backpack',
                'price' => 'Rp299.000,00',
                'badge' => '5% OFF',
                'oldPrice' => 'Rp314.000,00',
            ],
            [
                'image' => 'images/Nereus-AP1602-4.jpg',
                'category' => 'Backpack',
                'name' => 'Asus Nereus AP1602 Backpack',
                'price' => 'Rp299.000,00',
                'badge' => '5% OFF',
                'oldPrice' => 'Rp314.000,00',
            ],
            [
                'image' => 'images/Nereus-AP1602-4.jpg',
                'category' => 'Backpack',
                'name' => 'Asus Nereus AP1602 Backpack',
                'price' => 'Rp299.000,00',
                'badge' => '5% OFF',
                'oldPrice' => 'Rp314.000,00',
            ],
        ];
    }

    public function getTabs(): array
    {
        return ['Power Deals', 'New Arrival', 'Top Rate', 'Best Selling'];
    }
}
