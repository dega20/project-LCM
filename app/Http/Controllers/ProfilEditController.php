<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilEditController extends Controller
{
    public function index()
    {
        return view('profil.edit'); 
    }
}
