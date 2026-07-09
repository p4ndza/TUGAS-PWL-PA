<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    protected $table = 'detail_transaksi';
    protected $primaryKey = 'id_detail_transaksi';
    public $timestamps = false;

    protected $fillable = [
        'id_transaksi', 
        'id_produk', // WAJIB ADA DI SINI
        'jumlah', 
        'harga_satuan', 
        'subtotal'
    ];
}