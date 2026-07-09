<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table = 'pesanan';
    protected $primaryKey = 'id_pesanan';

    // ── MATIKAN TIMESTAMP OTOMATIS (Mencegah error updated_at) ──
    public $timestamps = false;

    protected $guarded = [];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    // Relasi ke Detail Pesanan
    public function details()
    {
        return $this->hasMany(DetailPesanan::class, 'id_pesanan');
    }

    // Relasi ke Transaksi
    public function transaksi()
    {
        return $this->hasOne(Transaksi::class, 'id_pesanan');
    }
}