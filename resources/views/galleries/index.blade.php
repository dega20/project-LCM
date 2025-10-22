@extends('layouts.app')
@section('content_title', 'Manajemen Galeri')
@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title my-1">Daftar Gambar</h3>
        <div class="d-flex justify-content-end">
            <a href="{{ route('galleries.create') }}" class="btn btn-sm btn-primary">Tambah Gambar</a>
        </div>
    </div>
    <div class="card-body">
        
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- START GRID TAMPILAN GALERI --}}
        <div class="row">
            @foreach ($galleries as $gallery)
                {{-- Kolom untuk setiap gambar (4 gambar per baris di desktop) --}}
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card shadow-sm h-100">
                        
                        {{-- GAMBAR --}}
                        <div style="height: 180px; overflow: hidden;">
                            @if ($gallery->image)
                                <img src="{{ asset('storage/' . $gallery->image) }}" class="card-img-top" alt="{{ $gallery->title }}" style="width: 100%; height: 100%; object-fit: cover;">
                            @else
                                <div class="text-center p-5 bg-light">Tidak Ada Gambar</div>
                            @endif
                        </div>

                        <div class="card-body p-3">
                            <h5 class="card-title mb-1 text-truncate">{{ $gallery->title }}</h5>
                            <p class="card-text text-muted small">{{ $gallery->category ?? 'Tidak Berkategori' }}</p>
                        </div>
                        
                        <div class="card-footer d-flex justify-content-end">
                            {{-- Tombol View --}}
                            <a href="{{ route('galleries.show', $gallery->id) }}" class="btn btn-sm btn-info" title="Lihat Detail"><i class="fas fa-eye"></i></a>
                            
                            {{-- Tombol Edit --}}
                            <a href="{{ route('galleries.edit', $gallery->id) }}" class="btn btn-sm btn-warning mx-1" title="Edit"><i class="fas fa-edit"></i></a>
                            
                            {{-- Tombol Delete --}}
                            <a href="{{ route('galleries.destroy', $gallery->id) }}" data-confirm-delete="true"
                                class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i>
                            </a>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
        {{-- END GRID TAMPILAN GALERI --}}
        
        <div class="mt-3 d-flex justify-content-center">
            {{ $galleries->links() }}
        </div>
    </div>
</div>
@endsection