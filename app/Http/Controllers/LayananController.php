<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Layanan;
use App\Models\Kategori;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    private function cleanPrice($priceInput)
    {
        return str_replace(['.', ','], '', $priceInput); 
    }

    public function indexPublic() // Misalnya, index() atau showHomepage()
{
    // 1. Ambil data layanan dari database
    $layanans = Layanan::latest()->get(); 

    $produks = Produk::with('kategori')->latest()->get(); 
    
    // 2. Kirim data ke view menggunakan compact()
    // Ganti 'index.blade.php' dengan nama view yang benar jika berbeda
    return view('index.index', compact('layanans','produks')); 
}

    public function index()
    {
        $layanans = Layanan::with('kategori')->latest()->get();
        confirmDelete('Hapus layanan', 'Apakah yakin menghapus layanan ini?');
        return view('layanan.index', compact('layanans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoris = Kategori::orderBy('name')->get(); 
        return view('layanan.create', compact('kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validasi Data
        $validatedData = $request->validate([
            'name' => 'required|string|unique:layanans,name',
            'kategori_id' => 'required|exists:kategoris,id',
            'price' => 'required|string', // Validasi sebagai string karena ada pembersih
            'description' => 'required|string',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // 2. Pembersihan Harga & Slug
        $validatedData['price'] = $this->cleanPrice($validatedData['price']);
        $validatedData['slug'] = Str::slug($validatedData['name']);
        
        $i = 1;
        while (Layanan::where('slug', $validatedData['slug'])->exists()) {
            $validatedData['slug'] .= '-' . $i++;
        }

        // 3. Upload Gambar
        if ($request->hasFile('icon')) {
        $path = $request->file('icon')->store('services/icons', 'public');
        $validatedData['icon'] = $path;
    }
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('services', 'public');
            $validatedData['image'] = $path;
        }
        
        // 4. Simpan Data
        Layanan::create($validatedData);

        toast()->success('Layanan berhasil ditambahkan.');
        return redirect()->route('produk-layanan.layanan.index');
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
    public function edit(Layanan $layanan)
    {
        $kategoris = Kategori::orderBy('name')->get();
        return view('layanan.edit', compact('kategoris', 'layanan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Layanan $layanan)
    {
        $validatedData = $request->validate([
        // Aturan UNIQUE: Abaikan ID layanan yang sedang diedit
        'name' => 'required|string|unique:layanans,name,' . $layanan->id,
        'kategori_id' => 'required|exists:kategoris,id',
        'price' => 'required|string', // String karena ada pembersih
        'description' => 'required|string',
        'icon' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    // 2. Pembersihan Harga & Slug
    $validatedData['price'] = $this->cleanPrice($validatedData['price']);
    $originalSlug = Str::slug($validatedData['name']);
    $validatedData['slug'] = $originalSlug;

    // Pengecekan Keunikan Slug, mengabaikan record saat ini
    $i = 1;
    while (Layanan::where('slug', $validatedData['slug'])->where('id', '!=', $layanan->id)->exists()) {
        $validatedData['slug'] = $originalSlug . '-' . $i++;
    }

    // 3. Logika Upload Gambar & Hapus Lama

    if ($request->hasFile('icon')) {
        if ($layanan->icon) {
            Storage::disk('public')->delete($layanan->icon);
        }
        $path = $request->file('icon')->store('services/icons', 'public');
        $validatedData['icon'] = $path;
    }


    if ($request->hasFile('image')) {
        // Hapus gambar lama jika ada
        if ($layanan->image) {
            Storage::disk('public')->delete($layanan->image);
        }
        // Simpan gambar baru
        $path = $request->file('image')->store('services', 'public');
        $validatedData['image'] = $path;
    }

    // 4. Update Data
    $layanan->update($validatedData);
    toast()->success('Layanan berhasil diperbarui.');
    return redirect()->route('produk-layanan.layanan.index'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Layanan $layanan)
    {
        if ($layanan->image) {
        Storage::disk('public')->delete($layanan->image);
    }
    
    $layanan->delete();
    toast()->success('Layanan berhasil dihapus.');
    return redirect()->route('produk-layanan.layanan.index');
    }
}
