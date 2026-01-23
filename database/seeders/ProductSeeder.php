<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $path = database_path('seeders/data/productList.csv');

        if (!File::exists($path)) {
            return;
        }

        $rows = array_map('str_getcsv', file($path));
        $header = array_shift($rows); // remove header

        foreach ($rows as $row) {
            if (count($row) < 5) {
                continue;
            }

            DB::table('products')->insert([
                'product_name' => trim($row[0]),
                'specs'        => trim($row[1]),
                'price'        => trim($row[2]),
                'brand'        => trim($row[3]),
                'category'     => trim($row[4]),
                'image_array'  => null,
            ]);
        }
    }
}
