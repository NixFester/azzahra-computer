<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Add missing columns if they don't exist
            if (!Schema::hasColumn('products', 'product_name')) {
                $table->string('product_name')->nullable();
            }
            if (!Schema::hasColumn('products', 'category')) {
                $table->string('category')->nullable();
            }
            if (!Schema::hasColumn('products', 'brand')) {
                $table->string('brand')->nullable();
            }
            if (!Schema::hasColumn('products', 'specs')) {
                $table->text('specs')->nullable();
            }
            if (!Schema::hasColumn('products', 'image_array')) {
                $table->json('image_array')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumnIfExists('product_name');
            $table->dropColumnIfExists('category');
            $table->dropColumnIfExists('brand');
            $table->dropColumnIfExists('specs');
            $table->dropColumnIfExists('image_array');
        });
    }
};
