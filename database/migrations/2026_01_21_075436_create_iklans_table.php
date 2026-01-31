<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        

        // 2. Create new table with updated enum
        Schema::create('iklans', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['banner', 'promo', 'brand']);
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('image_path');
            $table->string('link')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        

    }

    public function down(): void
    {
        Schema::dropIfExists('iklans');
    }
};
