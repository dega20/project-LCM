@extends('layouts.app')
@section('content_title', 'Kategori')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title my-1">Tambah Kategori</h3>
    </div>
    <div class="card-body">
         <form action="{{ route('produk-layanan.kategori.store') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label for="name">Nama Kategori</label>
                    <input type="text" 
                           name="name"
                           id="nama" 
                           class="form-control @error('name') is-invalid @enderror" 
                           value="{{ old('name') }}" 
                           required>
                    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                
                {{-- <div class="form-group mb-3">
                    <label for="slug">Slug (URL)</label>
                    <input type="text" 
                           name="slug" 
                           id="slug" 
                           class="form-control @error('slug') is-invalid @enderror" 
                           value="{{ old('slug') }}" 
                           required>
                    @error('slug') <small class="text-danger">{{ $message }}</small> @enderror
                </div> --}}

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('produk-layanan.kategori.index') }}" class="btn btn-secondary">Batal</a>
            </form>
    </div>
</div>
@endsection
