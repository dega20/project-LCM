<?php

namespace App\Http\Controllers;

use App\Models\ProfilTim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilTimController extends Controller
{
    public function index()
    {
        $profilTim = ProfilTim::all();
        confirmDelete('Hapus Profil Tim', 'Apakah yakin ingin menghapus profil tim ini?');
        return view('profil-tim.index', compact('profilTim'));
    }

    public function store(Request $request)
    {
        $id = $request->id;
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'email' => 'nullable|email|max:255' . $id,
            'phone' => 'nullable|string|max:20',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $newRequest = $request->all();

        if ($request->hasFile('photo')) {
            // Jika ada foto lama, hapus dulu
            $existingMember = ProfilTim::find($id);
            if ($existingMember && $existingMember->photo) {
                Storage::disk('public')->delete($existingMember->photo);
            }
            // Simpan foto baru dan dapatkan path-nya
            $path = $request->file('photo')->store('photos', 'public');
            $newRequest['photo'] = $path;
        }
        ProfilTim::updateOrCreate(['id'=> $id], $newRequest);
        toast()->success('Profil tim berhasil disimpan');
        return redirect()->route('profil-perusahaan.profil-tim.index');


        // $profilTim = new ProfilTim();
        // $profilTim->name = $request->name;
        // $profilTim->position = $request->position;
        // $profilTim->email = $request->email;
        // $profilTim->phone = $request->phone;

        // if ($request->hasFile('photo')) {
        //     $imageName = time().'.'.$request->photo->extension();  
        //     $request->photo->move(public_path('images'), $imageName);
        //     $profilTim->photo = $imageName;
        // }

        // $profilTim->save();

        // return redirect()->route('profil-perusahaan.profil-tim.index')->with('success', 'Profil tim berhasil ditambahkan.');
    }

    public function destroy(String $id)
    {
            
        $profilTim = ProfilTim::findOrFail($id);
        // Hapus foto dari storage jika ada
        if ($profilTim->photo) {
            Storage::disk('public')->delete($profilTim->photo);
        }
        $profilTim->delete();

        toast()->success('Data profil tim berhasil dihapus');
        return redirect()->route('profil-perusahaan.profil-tim.index');
    }
}
