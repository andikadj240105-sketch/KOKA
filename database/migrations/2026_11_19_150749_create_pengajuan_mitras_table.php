<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengajuan_mitras', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('no_telpon');
            $table->string('nama_kosan');
            $table->text('alamat_kosan');
            $table->integer('jumlah_kamar');
            $table->enum('paket_pengelolaan', ['Auto Pilot', 'Full Service']);
            $table->string('status')->default('Menunggu Survei');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengajuan_mitras');
    }
};