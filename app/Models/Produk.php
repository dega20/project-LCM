<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $fillable = [
    'name', 
    'slug',
    'kategori_id', // WAJIB: Kolom foreign key
    'description',
    'price',
    'image'
];

    // Relasi ke model Kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
