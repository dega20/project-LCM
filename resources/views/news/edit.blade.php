@extends('layouts.app') 
@section('content_title', 'Edit Berita: ' . $news->title)
@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit berita</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') {{-- WAJIB: Method spoofing --}}

            <div class="form-group mb-3">
                <label for="title">Judul Berita</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" 
                       value="{{ old('title', $news->title) }}" required>
                @error('title') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            
            <div class="form-group mb-3">
                <label for="author">Penulis</label>
                <input type="text" name="author" class="form-control @error('author') is-invalid @enderror" 
                       value="{{ old('author', $news->author) }}" required>
                @error('author') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group mb-3">
                <label for="status">Status Publikasi</label>
                <select name="status" class="form-control @error('status') is-invalid @enderror" required>
                    @php $currentStatus = old('status', $news->status); @endphp
                    <option value="draft" {{ $currentStatus == 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="published" {{ $currentStatus == 'published' ? 'selected' : '' }}>Published</option>
                </select>
                @error('status') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            @if ($news->image)
                <div class="mb-3">
                    <p>Gambar Saat Ini:</p>
                    <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" style="max-width: 150px; height: auto;">
                </div>
            @endif

            <div class="form-group mb-3">
                <label for="image">Ganti Gambar Unggulan</label>
                <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                @error('image') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group mb-3">
                <label for="content">Isi Berita</label>
                <textarea name="content" class="form-control @error('content') is-invalid @enderror" rows="10" required>{{ old('content', $news->content) }}</textarea>
                @error('content') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="{{ route('news.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection