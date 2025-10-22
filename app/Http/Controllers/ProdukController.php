<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    // public function indexPublic()
    // {
    //     $produks = Produk::latest()->get();
    
    //     return view('index.index', compact('produks'));
    // }
    public function index()
    {
        $produks = Produk::with('kategori')->latest()->get();
        confirmDelete('Hapus Produk', 'Apakah yakin menghapus produk ini?');
        return view('produk.index', compact('produks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoris = Kategori::orderBy('name')->get();
        return view('produk.create', compact('kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|unique:produks,name',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'kategori_id' => 'required|exists:kategoris,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $originalSlug = Str::slug($validatedData['name']);
        $validatedData['slug'] = $originalSlug;
        
        $i = 1;
        while (Produk::where('slug', $validatedData['slug'])->exists()) {
            $validatedData['slug'] = $originalSlug . '-' . $i++;
        }

        if ($request->hasFile('image')) {
            // Simpan gambar di storage/app/public/products
            $path = $request->file('image')->store('products', 'public');
            $validatedData['image'] = $path;
        }

        Produk::create($validatedData);
        toast()->success('Produk berhasil ditambahkan.');
        return redirect()->route('produk-layanan.produk.index');
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
    public function edit(Produk $produk)
    {
        $kategoris = Kategori::orderBy('name')->get();
        return view('produk.edit', compact('kategoris', 'produk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produk $produk)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|unique:produks,name,' . $produk->id,
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'kategori_id' => 'required|exists:kategoris,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $originalSlug = Str::slug($validatedData['name']);
        $validatedData['slug'] = $originalSlug;

        $i = 1;
        while (Produk::where('slug', $validatedData['slug'])->where('id', '!=', $produk->id)->exists()) {
            $validatedData['slug'] = $originalSlug . '-' . $i++;
        }

        // 3. Logika Upload Gambar & Hapus Lama
        if ($request->hasFile('image')) {
            if ($produk->image) {
                Storage::disk('public')->delete($produk->image);
            }
            $path = $request->file('image')->store('products', 'public');
            $validatedData['image'] = $path;
        }

        // 4. Update Data
        $produk->update($validatedData);
        toast()->success('Produk berhasil diperbarui');
        return redirect()->route('produk-layanan.produk.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        if ($produk->image) {
            Storage::disk('public')->delete($produk->image);
        }
        
        $produk->delete();
        toast()->success('Produk berhasil dihapus.');

        return redirect()->route('produk-layanan.produk.index');
    }
}
