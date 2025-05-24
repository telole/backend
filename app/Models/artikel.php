<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class artikel extends Model
{
    //
    protected $guarded = ['id'];

    protected $table = 'artikel';

    public $timestamps = false;


    public function creator() {
        return $this->belongsTo(User::class, 'penulis_id', 'id');
    }
}
