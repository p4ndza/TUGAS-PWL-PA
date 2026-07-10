<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPesanan extends Model
{
    // Beritahu Laravel nama tabelnya secara eksplisit
    protected $table = 'detail_pesanan';

    // Beritahu primary key-nya (jika bukan 'id')
    protected $primaryKey = 'id_detail';

    // Matikan timestamps jika tidak ada kolom created_at/updated_at
    public $timestamps = false;

    // Pastikan semua kolom yang akan diisi masuk ke sini
    protected $fillable = [
        'id_pesanan', 
        'id_produk', 
        'jumlah', 
        'harga', 
        'harga_satuan'
    ];

    /**
     * Relasi ke Model Produk
     * Fungsi ini yang dipanggil oleh TransaksiController saat melakukan:
     * Transaksi::with(['pesanan.details.produk'])
     */
    public function produk()
    {
        // Menghubungkan id_produk di tabel detail_pesanan 
        // dengan id_produk di tabel produk
        return $this->belongsTo(Produk::class, 'id_produk', 'id_produk');
    }
}