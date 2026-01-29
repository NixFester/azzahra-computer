<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // 1. Rename old table
        Schema::rename('iklans', 'iklans_old');

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

        // 3. Copy data
        DB::statement("
            INSERT INTO iklans (
                id, type, title, description, image_path,
                link, is_active, `order`, created_at, updated_at
            )
            SELECT
                id, type, title, description, image_path,
                link, is_active, `order`, created_at, updated_at
            FROM iklans_old
        ");

        // 4. Drop old table
        Schema::drop('iklans_old');
    }

    public function down(): void
    {
        Schema::rename('iklans', 'iklans_old');

        Schema::create('iklans', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['banner', 'promo']); // revert
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('image_path');
            $table->string('link')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        DB::statement("
            INSERT INTO iklans
            SELECT * FROM iklans_old
        ");

        Schema::drop('iklans_old');
    }
};
