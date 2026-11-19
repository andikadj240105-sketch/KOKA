<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    // Izinkan kolom-kolom ini diisi data
    protected $fillable = [
        'user_id',
        'kos_id',
        'layanan',
        'email',
        'tanggal_survei',
        'tanggal_masuk',
        'durasi',
        'catatan',
        'nama',
        'no_hp',
        'pickup',
        'tujuan',
        'tanggal',
        'jam',
        'status',
        'total_harga',
        'foto',
        'bukti_pembayaran',
        
        // Kolom spesifik form layanan dinamis
        'kendaraan',
        'lantai',
        'lift',
        'ruangan',
        'luas_ruangan',
        'jenis_layanan',
        'kategori_kerusakan',
        'deskripsi_kerusakan',
        'berat_laundry',
    ];

    public function kos()
    {
        return $this->belongsTo(Kos::class, 'kos_id');
    }
}