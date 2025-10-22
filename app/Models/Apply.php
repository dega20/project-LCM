<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Apply extends Model
{
    protected $table = 'applies';
    protected $fillable = [
        'nama',
        'email',
        'posisi',
        'deskripsi',
        'cv',
        'status',
    ];
}
