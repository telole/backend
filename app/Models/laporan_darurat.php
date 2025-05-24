<?php

namespace App\Models;

use GlobalFunctionFile;
use Illuminate\Database\Eloquent\Model;

class laporan_darurat extends Model
{
    //
    protected $table = 'laporan_darurat';
    protected $guarded = ['id'];

    public $timestamps = false;

    public function pelapor() {
        return $this->belongsTo(User::class, 'pelapor_id', 'id');
    }

}
