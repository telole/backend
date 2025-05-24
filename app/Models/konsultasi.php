<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class konsultasi extends Model
{
    //

    protected $table = 'konsultasi';

    protected $guarded  = ['id'];

    public $timestamps = false;

    public function consultation() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
