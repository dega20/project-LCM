<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProfilController extends Controller
{
    public function index()
    {
        // Ambil data profil pertama (atau buat yang baru jika tidak ada)
        $profil = Profil::firstOrCreate([]); 
        
        
        return view('profil.index', compact('profil'));
    }

    public function edit(){
        return view('profil.edit');
    }

    public function store(Request $request)
    {
        // Validasi data profil yang masuk
        $request->validate([
            'nama_perusahaan' => 'required|string',
            'visi'            => 'nullable|string',
            'misi'            => 'nullable|string',
            'tentang_kami'    => 'nullable|string',
            'alamat'          => 'nullable|string',
            'email'           => 'nullable|email',
            'telepon'         => 'nullable|string',
        ]);

        // Cari atau buat profil pertama
        $profil = Profil::firstOrCreate([]);

        // Perbarui profil dengan data dari request
        $profil->update($request->all());

        toast()->success('Profil berhasil diperbarui');
        return redirect()->route('profil-perusahaan.profil.index');
    }
    
}