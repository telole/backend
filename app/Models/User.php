<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */

     public function isPetugas()
    {
        return $this->role === 'petugas';
    }

    public function isSiswa()
    {
        return $this->role === 'siswa';
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    public function siswa() {
        return $this->hasMany(kunjungan::class, 'user_id', 'id');
    }

    public function petugas() {
        return $this->hasMany(kunjungan::class, 'petugas_id', 'id');
    }


    public function laporanDarurat() {
        return $this->hasMany(laporan_darurat::class, 'pelapor_id', 'id');
    }


    public function konsultasi() {
        return $this->hasMany( konsultasi::class, 'user_id', 'id');
    }

    public function send() {
        return $this->hasMany(chat::class, 'pengirim_id', 'id');
    }                                                                                                                                       

    public function receive() {
        return $this->hasMany(chat::class, 'penerima_id', 'id');
    }

    public function article() {
        return $this->hasMany(artikel::class, 'penulis_id', 'id');
    }
}



