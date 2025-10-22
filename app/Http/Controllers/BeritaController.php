<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{

    private function createUniqueSlug($title, $ignoreId = null)
    {
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $i = 1;
        
        $query = Berita::where('slug', $slug);
        if ($ignoreId) { $query->where('id', '!=', $ignoreId); }
        
        while ($query->exists()) {
            $slug = $originalSlug . '-' . $i++;
            $query = Berita::where('slug', $slug);
            if ($ignoreId) { $query->where('id', '!=', $ignoreId); }
        }
        return $slug;
    }
    public function index()
    {
        $beritas = Berita::latest()->get();
        return view('berita.index', compact('beritas'));
    }

    public function create()
    {
        return view('berita.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|unique:beritas,title',
            'content' => 'required|string',
            'author' => 'required|string|max:255', 
            'status' => 'required|string|in:Draft,Published',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $validatedData['slug'] = $this->createUniqueSlug($validatedData['title']);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('beritas', 'public');
            $validatedData['image'] = $path;
        }

        Berita::create($validatedData);
        toast('Berita berhasil ditambahkan.', 'success');
        return redirect()->route('berita.index');
    }

    public function edit(Berita $berita){
        return view('berita.edit', compact('berita'));
    }

    public function update(request $request, Berita $berita){
        $validatedData = $request->validate([
            'title' => 'required|string|unique:beritas,title,' . $berita->id,
            'content' => 'required|string',
            'author' => 'required|string|max:255', 
            'status' => 'required|string|in:Draft,Published',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

       $validatedData['slug'] = $this->createUniqueSlug($validatedData['title'], $berita->id);

        // 3. Upload Gambar & Hapus Lama
        if ($request->hasFile('image')) {
            if ($berita->image) {
                Storage::disk('public')->delete($berita->image);
            }
            $path = $request->file('image')->store('beritas', 'public');
            $validatedData['image'] = $path;
        }

        $berita->update($validatedData);
        toast('Berita berhasil diperbarui.', 'success');
        return redirect()->route('berita.index');
    }

    public function destroy(Berita $berita){
        if ($berita->image){
            Storage::disk('public')->delete($berita->image);
        }
        $berita->delete();
        toast('Berita berhasil dihapus.', 'success');
        return redirect()->route('berita.index');
    }

    public function show(Berita $berita){
        return view('berita.show', compact('berita')); 
    }
}
