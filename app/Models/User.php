<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    // Sesuaikan nama tabel tunggal Anda
    protected $table = 'user';
    
    // Sesuaikan primary key kustom Anda
    protected $primaryKey = 'id_user';

    public $timestamps = false;

    // Kolom yang boleh diisi saat register
    protected $fillable = [
        'nama',
        'email',
        'password',
        'no_telp',
        'alamat',
        'role', // 'admin_umkm' atau 'pelanggan'
    ];

    // Menyembunyikan password saat data user dipanggil
    protected $hidden = [
        'password',
    ];

    // Beritahu Laravel untuk memeriksa password yang ter-hash
    public function getAuthPassword()
    {
        return $this->password;
    }
}