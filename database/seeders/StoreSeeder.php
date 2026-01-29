<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Store;
use App\Models\Internship;

class StoreSeeder extends Seeder
{
    public function run(): void
    {
        Store::create([
            'whatsapp' => '+6285942001720',
            'instagram' => 'authorized_servicecenter.tegal',
            'youtube' => '@authorizedmultibrandservic9761'
        ]);

        Internship::create([
            'type' => 'batch',
            'image_url' => asset('images/intern1.jpg'),
            'title' => 'Default Batch',
            'order' => 0
        ]);
    }
}