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
    Schema::create('artikels', function (Blueprint $table) {
        $table->id();
        $table->string('judul');
        $table->string('slug')->unique(); // Untuk URL dinamis
        $table->string('kategori'); // Information, Tips, dll
        $table->string('gambar')->nullable();
        $table->text('deskripsi_singkat');
        $table->longText('konten'); // Isi detail artikel
        $table->string('penulis')->default('Admin');
        $table->enum('status', ['Draft', 'Published'])->default('Published');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artikels');
    }
};
