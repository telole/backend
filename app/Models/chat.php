<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class chat extends Model
{
    //
    protected $guarded  = ['id'];

    protected $table = 'chat';
    public $timestamps = false;

    public function sender() {
        return $this->belongsTo(User::class, 'pengirim_id', 'id');
    }

    public function receiver() {
        return $this->belongsTo(User::class, 'penerima_id', 'id');
    }
}
