@extends('layouts.app')
@section('content_title', 'Tambah Layanan Baru')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title my-1">Form Tambah Layanan</h3>
        </div>
        <div class="card-body">

            <form action="{{ route('produk-layanan.layanan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group mb-3">
                    <label for="name">Nama Layanan</label>
                    <input type="text" name="name" id="name"
                        class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="kategori_id">Kategori</label>
                    <select name="kategori_id" id="kategori_id"
                        class="form-control @error('kategori_id') is-invalid @enderror" required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach ($kategoris as $kategori)
                            <option value="{{ $kategori->id }}" {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>
                                {{ $kategori->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('kategori_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="description">Deskripsi</label>
                    <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"
                        rows="4" required>{{ old('description') }}</textarea>
                    @error('description')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="price">Harga</label>
                    <input type="number" name="price" id="price"
                        class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}" required>
                    @error('price')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>


                <div class="form-group mb-3">
                    <label for="icon">Icon</label>
                    <input type="file" name="icon" id="icon"
                        class="form-control @error('icon') is-invalid @enderror" required>
                    @error('icon')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="image">Gambar Utama</label>
                    <input type="file" name="image" id="image"
                        class="form-control @error('image') is-invalid @enderror">
                    @error('image')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Simpan Layanan</button>
                <a href="{{ route('produk-layanan.layanan.index') }}" class="btn btn-secondary">Batal</a>
            </form>

        </div>
    </div>
@endsection
