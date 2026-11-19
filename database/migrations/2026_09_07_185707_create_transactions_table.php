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
    Schema::create('transactions', function (Blueprint $table) {
        $table->id();
        $table->string('kode_trx')->unique(); // ex: TRX-8921
        $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
        $table->string('layanan'); // ex: 'Sewa Kos', 'KosanClean'
        $table->integer('total');
        $table->string('metode')->nullable(); // QRIS, Transfer, dll
        $table->enum('status', ['Berhasil', 'Pending', 'Dibatalkan'])->default('Pending');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
