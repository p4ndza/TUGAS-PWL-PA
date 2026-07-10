<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Produk; 

class DetailTransaksi extends Model
{
    protected $table = 'detail_transaksi';
    protected $primaryKey = 'id_detail_transaksi';
    public $timestamps = false;

    protected $fillable = [
        'id_transaksi', 
        'id_produk',
        'jumlah', 
        'harga_satuan', 
        'subtotal'
    ];

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk', 'id_produk');
    }
}