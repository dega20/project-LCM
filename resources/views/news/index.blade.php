@extends('layouts.app')
@section('content_title', 'Manajemen Berita')
@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title my-1">Daftar Berita</h3>
        <div class="d-flex justify-content-end">
            <a href="{{ route('news.create') }}" class="btn btn-sm btn-primary">Tambah Berita</a>
        </div>
    </div>
    <div class="card-body">
        
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-sm w-100" id="table2">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($news as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @if ($item->image)
                                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" style="max-width: 60px; height: auto;">
                            @else
                                -
                            @endif
                        </td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->author }}</td>
                        <td>
                            @php
                                $statusClass = ($item->status == 'published' ? 'bg-success' : 'bg-secondary');
                            @endphp
                            <span class="badge {{ $statusClass }}">
                                {{ ucfirst($item->status) }}
                            </span>
                        </td>
                        <td>{{ $item->created_at->format('d M Y') }}</td>
                        <td>
                            {{-- Tombol View --}}
                            <a href="{{ route('news.show', $item->id) }}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                            {{-- Tombol Edit --}}
                            <a href="{{ route('news.edit', $item->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                            {{-- Tombol Delete --}}
                            <a href="{{ route('news.destroy', $item->id) }}" data-confirm-delete="true"
                                class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        <div class="mt-3">
            {{ $news->links() }}
        </div>
    </div>
</div>
@endsection