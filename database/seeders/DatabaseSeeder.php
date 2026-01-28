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
        DB::table('products')->delete(); // remove all existing data
        $this->call(CsvSeeder::class);

        $path = database_path('seeders/data/productList.csv');
        if (!file_exists($path)) {
            return;
        }

        $rows = array_map('str_getcsv', file($path));
        array_shift($rows); // remove header

        foreach ($rows as $row) {
            if (count($row) < 5) continue;

            DB::table('products')->insert([
                'product_name' => trim($row[0]),
                'specs'        => trim($row[1]),
                'price'        => trim($row[2]),
                'brand'        => trim($row[3]),
                'category'     => trim($row[4]),
                'image_array'  => trim($row[5] ?? NUll),
            ]);
        }
    }

}
