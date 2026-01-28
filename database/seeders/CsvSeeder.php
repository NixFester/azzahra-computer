<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use League\Csv\Reader;

class CsvSeeder extends Seeder
{
    public function run(): void
    {
        $this->seedFromCsv('blogs', 'blogs.csv');
        $this->seedFromCsv('iklans', 'iklans.csv');
        $this->seedFromCsv('internship', 'internship.csv');
        $this->seedFromCsv('sessions', 'sessions.csv');
    }

    private function seedFromCsv(string $table, string $file): void
    {
        $path = database_path("seeders/data/{$file}");

        if (!file_exists($path)) {
            return;
        }

        $csv = Reader::createFromPath($path, 'r');
        $csv->setHeaderOffset(0);

        DB::table($table)->truncate();

        foreach ($csv as $row) {
            DB::table($table)->insert($row);
        }
    }
}