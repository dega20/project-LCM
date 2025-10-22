@extends('layouts.app')
@section('content_title', 'Kategori')
@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title my-1">Edit Kategori</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('produk-layanan.kategori.update', $kategori) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nama Kategori</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $kategori->name) }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Kategori</button>
            <a href="{{ route('produk-layanan.kategori.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
