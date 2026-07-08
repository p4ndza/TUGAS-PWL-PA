<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'user';
    protected $primaryKey = 'id_user';

    // ── TAMBAHKAN BARIS INI ──
    public $timestamps = false;

    protected $fillable = [
        'nama',
        'email',
        'password',
        'no_telp',
        'alamat',
        'role',
    ];

    protected $hidden = [
        'password',
    ];

    // Helper method untuk mengecek role
    public function isAdmin(): bool
    {
        return $this->role === 'admin_umkm';
    }

    public function isPelanggan(): bool
    {
        return $this->role === 'pelanggan';
    }
}