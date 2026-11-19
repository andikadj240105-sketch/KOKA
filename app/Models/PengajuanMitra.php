<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanMitra extends Model
{
    use HasFactory;

    protected $table = 'pengajuan_mitras';

    protected $fillable = [
        'nama',
        'no_telpon',
        'nama_kosan',
        'alamat_kosan',
        'jumlah_kamar',
        'paket_pengelolaan',
        'status',
    ];
}