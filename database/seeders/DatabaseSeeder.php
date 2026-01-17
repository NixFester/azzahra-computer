<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
    DB::table('products')->insert([
        ['name' => 'Laptop Gaming', 'price' => 15000000, 'image' => 'laptop.jpg'],
        ['name' => 'Smartphone Pro', 'price' => 8000000, 'image' => 'phone.jpg'],
        ['name' => 'Wireless Headphone', 'price' => 500000, 'image' => 'headphone.jpg'],
        ['name' => 'Smart Watch', 'price' => 2000000, 'image' => 'watch.jpg'],
    ]);

    DB::table('brands')->insert([
        ['name' => 'Samsung', 'logo' => 'samsung-logo.png'],
        ['name' => 'Apple', 'logo' => 'apple-logo.png'],
        ['name' => 'Sony', 'logo' => 'sony-logo.png'],
        ['name' => 'LG', 'logo' => 'lg-logo.png'],
    ]);

    DB::table('reviews')->insert([
        ['name' => 'John Doe', 'rating' => 5, 'comment' => 'Produk sangat bagus!', 'avatar' => 'avatar1.jpg'],
        ['name' => 'Jane Smith', 'rating' => 4, 'comment' => 'Kualitas oke!', 'avatar' => 'avatar2.jpg'],
        ['name' => 'Budi Santoso', 'rating' => 5, 'comment' => 'Recommended!', 'avatar' => 'avatar3.jpg'],
    ]);
}
}
