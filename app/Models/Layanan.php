<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    protected $fillable = [
        'name', 
        'slug',
        'description',
        'price',
        'icon',       // Tambahkan kolom icon
        'image',      // Tambahkan kolom image
        'kategori_id',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
