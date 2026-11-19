<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    // Tambahkan kode ini agar Laravel mengizinkan kolom 'harga' (dan lainnya) untuk disimpan.
    // Ini sama seperti yang kita terapkan di User.php sebelumnya.
    protected $guarded = ['id'];
}