<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table = 'pesanan';
    protected $primaryKey = 'id_pesanan';

    public $timestamps = false;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function details()
    {
        return $this->hasMany(DetailPesanan::class, 'id_pesanan');
    }

    public function transaksi()
    {
        return $this->hasOne(Transaksi::class, 'id_pesanan');
    }
}