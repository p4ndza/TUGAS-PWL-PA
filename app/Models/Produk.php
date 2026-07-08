<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    // Nama tabel di database kamu
    protected $table = 'produk';
    
    // Primary key di database kamu
    protected $primaryKey = 'id_produk';
    
    // Matikan timestamps karena di modelmu tidak pakai created_at/updated_at
    public $timestamps = false;

    // Kolom yang boleh diisi massal saat input data
    protected $fillable = ['id_kategori', 'nama_produk', 'deskripsi', 'harga', 'stok', 'foto_produk'];

    // Relasi ke model Kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
    }
}