@extends('layouts.app')
@section('content_title', 'Role User')
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title my-1">Role User</h4>
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
                        {{-- <th>No</th> --}}
                        <th style="width: 10%;">No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            {{-- <td>{{ $index + 1 }}</td> --}}
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                            @if ($user->roles->isEmpty())
                            <span class="badge bg-secondary">Tidak ada role</span>
                            @else
                                {{ $user->roles->pluck('name')->implode(', ') }}
                            @endif
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                {{-- Kunci utama: Kirimkan objek `$user` dan `$allRoles` ke komponen --}}
                                <x-role-user.form-role-user :user="$user" :all-roles="$allRoles" />
                            </div>
                        </td>
                            {{-- <td>
                                <a href="{{ route('manajemen-user.role-user.store', $user->id) }}" class="btn btn-sm btn-info">
                                Kelola Role
                            </a> --}}
                        
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>  
    

</div>
@endsection