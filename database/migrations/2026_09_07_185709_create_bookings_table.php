<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            // Kolom relasi ke user yang memesan (opsional/nullable jika mengizinkan tamu)
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            
            // Kolom-kolom detail pesanan
            $table->string('layanan'); // Kolom yang tadinya hilang/error
            $table->string('nama');
            $table->string('no_hp');
            $table->string('pickup');
            $table->string('tujuan');
            $table->date('tanggal');
            $table->string('jam');
            $table->string('status')->default('Menunggu');
            $table->integer('total_harga')->default(0);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
