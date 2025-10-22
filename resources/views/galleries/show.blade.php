@extends('layouts.app')
@section('content_title', 'Detail Gambar: ' . $gallery->title)
@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Detail Gambar</h3>
    </div>
    <div class="card-body">
        <div class="row">
            
            {{-- KOLOM GAMBAR (Besar) --}}
            <div class="col-md-7 mb-4 mb-md-0">
                @if ($gallery->image)
                    <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title }}" class="img-fluid rounded shadow-sm">
                @else
                    <div class="text-center p-5 bg-light border">Tidak Ada Gambar Utama</div>
                @endif
            </div>
            
            {{-- KOLOM INFORMASI METADATA --}}
            <div class="col-md-5">
                <strong><h4>{{ $gallery->title }}</h4></strong>
                <p class="text-muted">{{ $gallery->description ?? 'Tidak ada deskripsi.' }}</p>
                
                <table class="table table-sm table-striped">
                    <tbody>
                        <tr>
                            <th>Kategori:</th>
                            <td>{{ $gallery->category ?? 'Tidak Berkategori' }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Unggah:</th>
                            <td>{{ $gallery->created_at->format('d M Y, H:i') }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Diperbarui:</th>
                            <td>{{ $gallery->updated_at->format('d M Y, H:i') }}</td>
                        </tr>
                    </tbody>
                </table>
                
                <hr>
                
                {{-- TOMBOL AKSI --}}
                <div class="d-flex justify-content-start">
                    <a href="{{ route('galleries.edit', $gallery->id) }}" class="btn btn-warning mx-1">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <a href="{{ route('galleries.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali ke Galeri
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection