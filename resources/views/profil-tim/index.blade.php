@extends('layouts.app')
@section('content_title', 'Manajemen Tim')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title my-1">Manajemen Tim</h3>
        <div class="d-flex justify-content-end">
            <x-profil-tim.form-profil-tim />
        </div>
    </div>
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger d-flex flex-column">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <table class="table table-sm w-100" id="table2">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                {{-- Loop through team members --}}
                @foreach ($profilTim as $index => $member)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>
                            @if ($member->photo)
                                <img src="{{ asset('storage/' . $member->photo) }}" alt="Foto {{ $member->name }}" style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%; margin-left: 20px;">
                            @else
                                <span>Tidak Ada Foto</span>
                            @endif
                        </td>
                        <td>{{ $member->name }}</td>
                        <td>{{ $member->position }}</td>
                        <td>{{ $member->email }}</td>
                        <td>{{ $member->phone }}</td>
                        <td>
                                <div class="d-flex align-items-center">
                                    <x-profil-tim.form-profil-tim :id="$member->id" />
                                    <a href="{{ route('profil-perusahaan.profil-tim.destroy', $member->id) }}" data-confirm-delete="true"
                                            class="btn btn-sm btn-danger mx-1">
                                            <i class="fas fa-trash"></i>
                                    </a>
                                </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection