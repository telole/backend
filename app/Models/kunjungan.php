<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class kunjungan extends Model
{
    //
    protected $guarded  = ['id'];
    protected $table = 'kunjungan';

    public $timestamps = false;

    public function people() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function petugas() {
        return $this->belongsTo(User::class, 'petugas_id', 'id');
    }

    public function penggunaanobat() {
        return $this->hasMany(kunjungan::class, 'kunjungan_id', 'id');
    }
}
