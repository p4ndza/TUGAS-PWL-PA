<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    // Beritahu Laravel kalau nama tabelnya tunggal (bukan plural/categories)
    protected $table = 'kategori';

    // Beritahu primary key kustomnya
    protected $primaryKey = 'id_kategori';

    // Jika tabelmu tidak punya kolom created_at dan updated_at, set jadi false
    public $timestamps = false; 

    // Relasi ke Produk (One to Many)
    public function produk()
    {
        return $this->hasMany(Produk::class, 'id_kategori', 'id_kategori');
    }
}