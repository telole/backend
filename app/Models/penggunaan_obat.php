<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class penggunaan_obat extends Model
{

    //

    protected $guarded = ['id'];

    protected $table = 'penggunaan_obat';

    public $timestamps = false;


    public function obat() {
        return $this->belongsTo(obat::class, 'obat_id', 'id');
    }

    public function kunjungan() {
        return $this->belongsTo(kunjungan::class, 'kunjungan_id', 'id');
    }
}
