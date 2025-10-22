@extends('layouts.app') 
@section('content_title', 'Tambah Berita Baru')
@section('content')

<div class="card">
    <div class="card-body">
        <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group mb-3">
                <label for="title">Judul Berita</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required>
                @error('title') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            
            <div class="form-group mb-3">
                <label for="author">Penulis</label>
                <input type="text" name="author" class="form-control @error('author') is-invalid @enderror" value="{{ old('author') }}" required>
                @error('author') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group mb-3">
                <label for="status">Status Publikasi</label>
                <select name="status" class="form-control @error('status') is-invalid @enderror" required>
                    <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
                </select>
                @error('status') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            
            <div class="form-group mb-3">
                <label for="image">Gambar Unggulan</label>
                <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" required>
                @error('image') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group mb-3">
                <label for="content">Isi Berita</label>
                <textarea name="content" class="form-control @error('content') is-invalid @enderror" rows="10" required>{{ old('content') }}</textarea>
                @error('content') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="btn btn-primary">Simpan Berita</button>
            <a href="{{ route('news.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection