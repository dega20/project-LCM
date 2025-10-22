@extends('layouts.app')
@section('content_title', 'Manajemen Layanan')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title my-1">Daftar Layanan</h3>
        <div class="d-flex justify-content-end">
            {{-- Tombol Tambah Baru --}}
            <a href="{{ route('produk-layanan.layanan.create') }}" class="btn btn-sm btn-primary">Tambah Layanan</a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-sm w-100" id="layananTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Icon</th>
                    <th>Nama Layanan</th>
                    <th width="30%">Deskripsi</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($layanans as $layanan)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        {{-- Menampilkan Icon --}}
                        <td>
                            @if ($layanan->image)
                                <img src="{{ asset('storage/' . $layanan->image) }}" alt="{{ $layanan->name }}" style="max-width: 100px; height: auto;">
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            @if ($layanan->icon)
                                <img src="{{ asset('storage/' . $layanan->icon) }}" alt="{{ $layanan->name }}" style="max-width: 60px; height: auto;">
                            @else
                                -
                            @endif
                        </td>
                        {{-- Menampilkan Gambar --}}
                        <td>{{ $layanan->name }}</td>
                        {{-- Menampilkan Nama Kategori --}}
                        <td>{{ $layanan->description }}</td>
                        {{-- Menampilkan Harga --}}
                        <td>Rp {{ number_format($layanan->price, 0, ',', '.') }}</td>
                        <td>
                            {{-- Tombol Edit --}}
                            <a href="{{ route('produk-layanan.layanan.edit', $layanan->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                            
                            {{-- Tombol Delete --}}
                            <a href="{{ route('produk-layanan.layanan.destroy', $layanan->id) }}" data-confirm-delete="true"
                                class="btn btn-sm btn-danger mx-1">
                                            <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection