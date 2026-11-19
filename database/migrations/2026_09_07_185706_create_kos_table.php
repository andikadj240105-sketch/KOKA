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
    Schema::create('kos', function (Blueprint $table) {
        $table->id();
        $table->foreignId('owner_id')->constrained('users')->cascadeOnDelete();
        $table->string('nama');
        $table->string('lokasi'); // Kota/Daerah
        $table->text('alamat_lengkap');
        $table->enum('tipe', ['Campur', 'Putra', 'Putri']);
        $table->integer('harga'); // Harga per bulan
        $table->integer('kamar_total');
        $table->integer('kamar_tersedia');
        $table->text('deskripsi')->nullable();
        $table->string('foto_utama')->nullable();
        $table->decimal('rating', 3, 1)->default(0.0);
        $table->enum('status', ['Aktif', 'Menunggu', 'Nonaktif', 'Ditolak'])->default('Menunggu');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kos');
    }
};
