@extends('layouts.app')
@section('content_title', 'Data Role')
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title my-1">Data Roles</h4>
            <div class="d-flex justify-content-end">
                <x-role.form-role />
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
                        <th style="width: 100px">No</th>
                        <th>Name</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $index => $role)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $role->name }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <x-role.form-role :id="$role->id" />
                                    <a href="{{ route('manajemen-user.roles.destroy', $role->id) }}" data-confirm-delete="true"
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