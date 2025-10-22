@extends('layouts.app')
@section('content_title', 'Kategori')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title my-1">Data Kategori</h3>
        <div class="d-flex justify-content-end">
            <a href="{{ route('produk-layanan.kategori.create') }}" class="btn btn-sm btn-primary">Tambah Kategori</a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-sm w-100" id="table2" >
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kategoris as $kategori)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $kategori->name }}</td>
                        <td>
                            <a href="{{ route('produk-layanan.kategori.edit', $kategori->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <a href="{{ route('produk-layanan.kategori.destroy', $kategori->id) }}" data-confirm-delete="true"
                                class="btn btn-sm btn-danger mx-1">
                                            <i class="fas fa-trash"></i>
                            </a>
                            {{-- <form action="{{ route('produk-layanan.kategori.destroy', $kategori->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this kategori?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection