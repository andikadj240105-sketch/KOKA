<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $table = 'favorites';
    protected $guarded = ['id'];

    public function kos() {
        return $this->belongsTo(Kos::class, 'kos_id');
    }
}