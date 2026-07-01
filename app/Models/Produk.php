<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';
    protected $primaryKey = 'id_produk';
    public $timestamps = false;

    // Kolom yang boleh diisi massal saat input data
    protected $fillable = ['id_kategori', 'nama_produk', 'deskripsi', 'harga', 'stok', 'foto_produk'];

    // Kebalikan relasi: Produk ini milik Kategori apa
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
    }
}