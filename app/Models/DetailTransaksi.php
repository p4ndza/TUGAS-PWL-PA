<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Produk; // <--- INI SANGAT PENTING DITAMBAHKAN

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

    // Fungsi ini yang tadi dicari oleh Controller Anda
    public function produk()
    {
        // Menghubungkan id_produk di tabel detail_transaksi 
        // dengan id_produk di tabel produk
        return $this->belongsTo(Produk::class, 'id_produk', 'id_produk');
    }
}