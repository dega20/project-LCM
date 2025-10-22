<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategoris = Kategori::all();
        confirmDelete('Hapus Kategori', 'Apakah yakin menghapus kategori ini?');
        return view('kategori.index', compact('kategoris'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
        'name' => 'required|string|unique:kategoris,name',
    ]);
    
    // 2. Buat Slug Otomatis
    $originalSlug = Str::slug($validatedData['name']);
    $validatedData['slug'] = $originalSlug;

    // 3. Pengecekan Keunikan Slug
    $i = 1;
    while (Kategori::where('slug', $validatedData['slug'])->exists()) {
        $validatedData['slug'] = $originalSlug . '-' . $i++;
    }
    
    // 4. Simpan Data
    Kategori::create($validatedData);

    toast()->success('Kategori berhasil ditambahkan.');
    return redirect()->route('produk-layanan.kategori.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori)
    {
        return view('kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategori $kategori)
    {
        $validatedData = $request->validate([
        // Aturan UNIQUE: Mengabaikan ID yang sedang diedit
        'name' => 'required|string|unique:kategoris,name,' . $kategori->id,
        // Kita tidak perlu memvalidasi slug karena akan dibuat ulang
    ]);

    // 2. Buat Slug Baru
    $originalSlug = Str::slug($validatedData['name']);
    $validatedData['slug'] = $originalSlug;
    
    // 3. Pengecekan Keunikan Slug
    $i = 1;
    // Cek keunikan, tapi abaikan slug milik record ini sendiri
    while (Kategori::where('slug', $validatedData['slug'])->where('id', '!=', $kategori->id)->exists()) {
        $validatedData['slug'] = $originalSlug . '-' . $i++;
    }

    // 4. Update Data
    $kategori->update($validatedData);

    toast()->success('Kategori berhasil diperbarui.');
    return redirect()->route('produk-layanan.kategori.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();
        toast()->success('Kategori berhasil dihapus.');
        return redirect()->route('produk-layanan.kategori.index');

    }
}
