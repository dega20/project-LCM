<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProfilTim extends Model
{
    use HasFactory;
    protected $table = 'profil_tims';
    protected $fillable = [
        'name',
        'position',
        'email',
        'phone',
        'photo'
    ];
}
