<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_tiket')->unique(); // SC-20260623-00125
            $table->string('nama');
            $table->string('whatsapp');
            $table->enum('cabang', ['Tegal', 'Cibubur', 'Kampus Saintek', 'Kampus PKTJ']);
            $table->enum('jenis_device', ['Laptop', 'PC', 'Printer', 'Vacuum Robot', 'Smartphone', 'Lainnya']);
            $table->string('merk');
            $table->text('keluhan');
            $table->string('foto')->nullable(); // path file
            $table->enum('status_tiket', ['Menunggu', 'Diproses', 'Selesai', 'Ditolak'])->default('Menunggu');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};