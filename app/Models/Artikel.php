<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $guarded = ['id'];

    // Mengubah format kolom konten dari/ke JSON secara otomatis
    protected $casts = [
        'konten' => 'array',
    ];
}