@extends('layouts.app')
@section('content_title', 'Edit Profil Perusahaan')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title my-1">Edit Profil</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('profil-perusahaan.profil.store') }}" method="POST">
                @csrf
                
                    <div class="form-group mb-3">
                        <label for="nama_perusahaan">Nama Perusahaan</label>
                        <input type="text" name="nama_perusahaan" class="form-control" value="{{ $profil->nama_perusahaan ?? '' }}">
                        
                    </div>
                    <div class="form-group">
                        <label for="visi">Visi</label>
                        <textarea name="visi" class="form-control">{{ $profil->visi ?? '' }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="misi">Misi</label>
                        <textarea name="misi" class="form-control">{{ $profil->misi ?? '' }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="tentang_kami">Tentang Kami</label>
                        <textarea name="tentang_kami" class="form-control">{{ $profil->tentang_kami ?? '' }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" class="form-control" value="{{ $profil->alamat ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ $profil->email ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label for="telepon">Telepon</label>
                        <input type="text" name="telepon" class="form-control" value="{{ $profil->telepon ?? '' }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
    </div>
</div>
@endsection