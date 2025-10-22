<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\RoleUser;
use Illuminate\Http\Request;

class RoleUserController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->get();
        $allRoles = Role::all();

        return view('role-user.index', compact('users', 'allRoles'));
    }

    public function store(Request $request)
     {
        // Validasi data
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'role_id' => 'required|exists:roles,id'
        ]);
        
        // Temukan user dan tetapkan role
        $user = User::find($request->user_id);
        
        // sync() akan menghapus role lama dan menetapkan yang baru.
        $user->roles()->sync($request->role_id);
        toast()->success('Berhasil memperbarui role pengguna');
        return redirect()->route('manajemen-user.role_user.index')->with('success', 'Role pengguna berhasil diperbarui!');
    }
}