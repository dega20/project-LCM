@extends('layouts.app') 
@section('content_title', 'Tambah Gambar Baru')
@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title my-1">Form Unggah Gambar</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('galleries.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group mb-3">
                <label for="title">Judul Gambar</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required>
                @error('title') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            
            <div class="form-group mb-3">
                <label for="category">Kategori (Opsional)</label>
                <input type="text" name="category" class="form-control @error('category') is-invalid @enderror" value="{{ old('category') }}">
                @error('category') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            
            <div class="form-group mb-3">
                <label for="description">Deskripsi</label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="3">{{ old('description') }}</textarea>
                @error('description') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            
            <div class="form-group mb-3">
                <label for="image">File Gambar</label>
                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" required>
                @error('image') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="btn btn-primary">Unggah Gambar</button>
            <a href="{{ route('galleries.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection