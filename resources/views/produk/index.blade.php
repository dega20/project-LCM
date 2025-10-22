@extends('layouts.app')
@section('content_title', 'Manajemen Produk')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title my-1">Daftar Produk</h3>
        <div class="d-flex justify-content-end">
            <a href="{{ route('produk-layanan.produk.create') }}" class="btn btn-sm btn-primary">Tambah Produk</a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-sm w-100" id="table2">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Gambar</th>
                    <th width="20%">Nama Produk</th>
                    <th>Kategori</th>
                    <th width="30%">Deskripsi</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produks as $produk)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @if ($produk->image)
                                {{-- Tampilkan gambar produk, pastikan storage:link sudah dijalankan --}}
                                <img src="{{ asset('storage/' . $produk->image) }}" alt="{{ $produk->name }}" style="max-width: 60px; height: auto;">
                            @else
                                -
                            @endif
                        </td>
                        <td>{{ $produk->name }}</td>
                        <td>{{ $produk->kategori->name }}</td>
                        <td>{{ $produk->description }}</td>
                        <td>Rp {{ number_format($produk->price, 0, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('produk-layanan.produk.edit', $produk->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                            
                            <a href="{{ route('produk-layanan.produk.destroy', $produk->id) }}" data-confirm-delete="true"
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