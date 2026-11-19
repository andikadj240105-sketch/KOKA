<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kos extends Model
{
    use HasFactory;

    // Kunci nama tabel secara manual agar Laravel tidak mengubahnya menjadi 'koses'
    protected $table = 'kos';

    // Karena menggunakan guarded = ['id'], maka semua kolom baru di database 
    // (seperti fasilitas, foto_2, foto_3, foto_4) akan OTOMATIS diizinkan 
    // untuk disimpan tanpa perlu didaftarkan satu-satu.
    protected $guarded = ['id'];

    // Relasi: Kos ini milik siapa? (Tabel User)
    public function owner() 
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    // Relasi: Booking yang ada di kos ini
    public function bookings() 
    {
        return $this->hasMany(Booking::class);
    }
}