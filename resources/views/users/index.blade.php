@extends('layouts.app')
@section('content_title', 'Data Users')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title my-1">Data Users</h4>
            <div class="d-flex justify-content-end">
                <x-user.form-user />
            </div>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-{{ $type }}">
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
                        <th>Email</th>
                        <th>Nama User</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $index => $user)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->name }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <x-user.form-user :id="$user->id" />
                                    <a href="{{ route('manajemen-user.users.destroy', $user->id) }}" data-confirm-delete="true"
                                            class="btn btn-sm btn-danger mx-1">
                                            <i class="fas fa-trash"></i>
                                    </a>
                                    <x-user.reset-password :id="$user->id" />
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
