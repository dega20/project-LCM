@extends('layouts.app') 
@section('content_title', 'Edit Gambar: ' . $gallery->title)
@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title my-1">Form Edit Gambar</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('galleries.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') {{-- WAJIB: Method spoofing --}}

            <div class="form-group mb-3">
                <label for="title">Judul Gambar</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $gallery->title) }}" required>
                @error('title') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            
            <div class="form-group mb-3">
                <label for="category">Kategori (Opsional)</label>
                <input type="text" name="category" class="form-control @error('category') is-invalid @enderror" value="{{ old('category', $gallery->category) }}">
                @error('category') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            
            <div class="form-group mb-3">
                <label for="description">Deskripsi</label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="3">{{ old('description', $gallery->description) }}</textarea>
                @error('description') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            
            @if ($gallery->image)
                <div class="mb-3">
                    <p>Gambar Saat Ini:</p>
                    <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title }}" style="max-width: 150px; height: auto;">
                    <p class="text-muted small mt-1">Unggah file baru untuk mengganti gambar.</p>
                </div>
            @endif

            <div class="form-group mb-3">
                <label for="image">Ganti File Gambar</label>
                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                @error('image') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="{{ route('galleries.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection