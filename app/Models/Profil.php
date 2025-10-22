<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    use HasFactory;
    
    // Beri tahu Laravel bahwa nama tabel adalah 'profil', bukan 'profils'
    protected $table = 'profil';
    protected $fillable = [
        'nama_perusahaan',
        'visi',
        'misi',
        'tentang_kami',
        'alamat',
        'email',
        'telepon'
    ];
}
