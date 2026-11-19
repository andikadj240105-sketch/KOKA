<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use NotificationChannels\WebPush\HasPushSubscriptions;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    use Notifiable, HasPushSubscriptions;
    // Mengizinkan semua kolom diisi kecuali 'id' (sudah aman).
    // Karena menggunakan ini, kolom profil baru (jenis_kelamin, pekerjaan, dll) 
    // otomatis diizinkan untuk disimpan tanpa perlu didaftarkan satu per satu.
    protected $guarded = ['id'];

    // Sembunyikan password dan remember_token saat data di-convert ke array/JSON
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Kolom yang otomatis di-cast tipenya jika diperlukan
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Relasi: Jika user ini adalah owner, dia memiliki banyak kos
    public function kos() {
        return $this->hasMany(Kos::class, 'owner_id');
    }

    // Relasi: Transaksi yang dilakukan user
    public function transactions() {
        return $this->hasMany(Transaction::class);
    }
    
    // Relasi: User memiliki banyak Notifikasi
    public function notifikasis()
{
    return $this->hasMany(Notifikasi::class)->latest();
}
}