<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        confirmDelete('Hapus Role', 'Apakah yakin ingin menghapus role ini?');
        return view('roles.index', compact('roles'));
    }

    public function store(Request $request)
    {
        $id = $request->id;
        $request->validate([
            'name' => 'required|string|unique:roles,name',
        ], [
            'name.required' => 'Role harus diisi',
            'name.unique' => 'Role sudah terdaftar',
        ]);

        $newRequest = $request->all();

        Role::updateOrCreate(['id'=> $id], $newRequest);
        toast()->success('Role berhasil disimpan');
        return redirect()->route('manajemen-user.roles.index');
    }

    public function destroy(String $id)
    {
        $Role = Role::findOrFail($id);
        $Role->delete();

        toast()->success('Data role berhasil dihapus');
        return redirect()->route('manajemen-user.roles.index');
    }
}
