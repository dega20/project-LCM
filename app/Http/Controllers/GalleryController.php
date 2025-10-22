<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Menampilkan halaman daftar galeri.
     */
    public function index()
    {
        $galleries = Gallery::latest()->paginate(12);
        confirmDelete('Hapus Gambar', 'Apakah yakin menghapus gambar ini?');
        return view('galleries.index', compact('galleries'));
    }

    /**
     * Menampilkan form untuk membuat gambar baru.
     */
    public function create()
    {
        return view('galleries.create');
    }

    /**
     * Menyimpan gambar baru ke database.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image')->store('gallery-images', 'public');
        }

        Gallery::create($validatedData);
        toast('Gambar berhasil diunggah.', 'success');
        return redirect()->route('galleries.index');
    }

    /**
     * Menampilkan detail satu gambar.
     */
    public function show(Gallery $gallery)
    {
        return view('galleries.show', compact('gallery'));
    }

    /**
     * Menampilkan form untuk mengedit gambar.
     */
    public function edit(Gallery $gallery)
    {
        return view('galleries.edit', compact('gallery'));
    }

    /**
     * Mengupdate data gambar di database.
     */
    public function update(Request $request, Gallery $gallery)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Hapus gambar lama dari storage
            if ($gallery->image) {
                Storage::disk('public')->delete($gallery->image);
            }
            // Unggah gambar baru
            $validatedData['image'] = $request->file('image')->store('gallery-images', 'public');
        }
        
        $gallery->update($validatedData);
        toast('Detail gambar berhasil diperbarui.', 'success');
        return redirect()->route('galleries.index');
    }

    /**
     * Menghapus gambar dari database.
     */
    public function destroy(Gallery $gallery)
    {
        // Hapus gambar dari storage jika ada
        if ($gallery->image) {
            Storage::disk('public')->delete($gallery->image);
        }
        
        // Hapus data dari database
        $gallery->delete();
        toast('Gambar berhasil dihapus.', 'success');
        return redirect()->route('galleries.index');
    }
}