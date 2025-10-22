@extends('layouts.app')

@section('content_title', 'Tambah Apply')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tambah Data Apply</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('apply.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" value="{{ old('nama') }}" class="form-control">
                    @error('nama')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control">
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Posisi</label>
                    <input type="text" name="posisi" value="{{ old('posisi') }}" class="form-control">
                    @error('posisi')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="4">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label>CV</label>
                    <input type="file" name="cv" class="form-control">
                    @error('cv')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('apply.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@endsection
