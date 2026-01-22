<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Store contact details
        Schema::create('store', function (Blueprint $table) {
            $table->id();
            $table->string('whatsapp')->nullable();
            $table->string('instagram')->nullable();
            $table->string('youtube')->nullable();
            $table->timestamps();
        });

        // Internship table for batch image and brochures
        Schema::create('internship', function (Blueprint $table) {
            $table->id();
            $table->string('type'); // 'batch' or 'brochure'
            $table->string('image_url');
            $table->string('title')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('store');
        Schema::dropIfExists('internship');
    }
};