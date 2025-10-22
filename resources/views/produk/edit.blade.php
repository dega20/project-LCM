@extends('layouts.app')
@section('content_title', 'Edit Produk: ' . $produk->name)
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title my-1">Edit Produk</h3>
        </div>
        <div class="card-body">

            <form action="{{ route('produk-layanan.produk.update', $produk->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')


                <div class="form-group mb-3">
                    <label for="name">Nama Produk</label>
                    <input type="text" name="name" id="name"
                        class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $produk->name) }}"
                        required>
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
                            @php
                                // Cek nilai lama (old) atau nilai dari database ($produk)
                                $selectedId = old('kategori_id', $produk->kategori_id);
                            @endphp
                            <option value="{{ $kategori->id }}" {{ $selectedId == $kategori->id ? 'selected' : '' }}>
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
                    <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $produk->description) }}</textarea>
                    @error('description')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="price">Harga</label>
                    <input type="number" step="0.01" name="price" id="price"
                        class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $produk->price) }}"
                        required>
                    @error('price')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                @if ($produk->image)
                    <div class="mb-3">
                        <p>Gambar Saat Ini:</p>
                        <img src="{{ asset('storage/' . $produk->image) }}" alt="Gambar Produk"
                            style="max-width: 150px; height: auto;">
                        <p class="text-muted small mt-1">Unggah file baru untuk mengganti gambar.</p>
                    </div>
                @endif

                <div class="form-group mb-3">
                    <label for="image">Ganti Gambar Produk</label>
                    <input type="file" name="image" id="image"
                        class="form-control @error('image') is-invalid @enderror">
                    @error('image')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="{{ route('produk-layanan.produk.index') }}" class="btn btn-secondary">Batal</a>
            </form>

        </div>
    </div>
@endsection
