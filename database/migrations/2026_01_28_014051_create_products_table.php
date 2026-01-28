<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // INTEGER PRIMARY KEY AUTOINCREMENT
            $table->text('category')->nullable();
            $table->text('product_name');
            $table->text('brand')->nullable();
            $table->text('specs')->nullable();
            $table->integer('price');
            $table->text('image_array')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
