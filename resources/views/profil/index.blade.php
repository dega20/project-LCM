@extends('layouts.app')
@section('content_title', 'Profil Perusahaan')
@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title my-1">Lihat Profil</h3>
    </div>
    <div class="card-body">
        {{-- Menggunakan komponen blade untuk menampilkan detail profil --}}
        {{-- <x-profil.show-profil :profil="$profil"/> --}}
        <div class="row">
    <div class="col-md-12">
        <table class="table">
            <tbody>
                <tr>
                    <td style="width: 25%;">Nama Perusahaan</td>
                    <td>{{ $profil->nama_perusahaan }}</td>
                </tr>
                <tr>
                    <td>Visi</td>
                    <td>{{ $profil->visi }}</td>
                </tr>
                <tr>
                    <td>Misi</td>
                    <td>{{ $profil->misi }}</td>
                </tr>
                <tr>
                    <td>Tentang Kami</td>
                    <td>{{ $profil->tentang_kami }}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>{{ $profil->alamat }}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>{{ $profil->email }}</td>
                </tr>
                <tr>
                    <td>Telepon</td>
                    <td>{{ $profil->telepon }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
    </div>
    <div class="card-footer">
        {{-- Tombol untuk menampilkan form edit --}}
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editProfilModal">
            Edit Profil
        </button>
    </div>
</div>

{{-- Komponen modal yang berisi form edit --}}
<x-profil.form-profil :profil="$profil" />

@endsection