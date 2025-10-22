@extends('layouts.app')
@section('content_title', 'Detail Berita: ' . $news->title)
@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ $news->title }}</h3>
        <br>
        <p class="card-subtitle text-muted small mt-1"> Oleh: {{ $news->author }} | Tanggal: {{ $news->created_at->format('d M Y') }}</p>
    </div>
    <div class="card-body">
        <div class="row">
            
            {{-- Gambar Utama --}}
            <div class="col-md-12 mb-4">
                @if ($news->image)
                    <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" class="img-fluid rounded shadow-sm" style="max-height: 400px; width: auto;">
                @else
                    <p class="text-muted">Tidak ada gambar utama.</p>
                @endif
            </div>
            
            {{-- Konten --}}
            <div class="col-md-12">
                <p><strong>Status:</strong> <span class="badge {{ $news->status == 'published' ? 'bg-success' : 'bg-secondary' }}">{{ ucfirst($news->status) }}</span></p>
                <hr>
                <h4>Isi Berita</h4>
                <p>{!! nl2br(e($news->content)) !!}</p>
            </div>
        </div>
        
        <hr>
        <div class="d-flex justify-content-end">
            <a href="{{ route('news.edit', $news->id) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('news.index') }}" class="btn btn-secondary mx-1">Kembali ke Daftar</a>
        </div>
    </div>
</div>

@endsection