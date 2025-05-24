<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class obat extends Model
{
    //
    protected $table = 'obat';
    protected $guarded = ['id'];

    public $timestamps =  false;

    public function penggunaan() {
        return $this->hasMany(penggunaan_obat::class,'obat_id', 'id');
    }


}
