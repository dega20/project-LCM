<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
    $users = User::all();
    confirmDelete('Hapus User', 'Apakaah yakin menghapus user ini?');
    return view('users.index', compact('users'));
    }

    public function store(Request $request)
    {
        $id = $request->id;
        $request->validate([
            'name'  => 'required',
            'email'  => 'required|email|unique:users,email,' . $id,
        ],[
            'name.required' => 'Nama harus diisi',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
        ]);

        $newRequest = $request->all();

        if (!$id) {
            $newRequest['password'] = Hash::make('12345678');
        }

        User::updateOrCreate(['id'=> $id], $newRequest);
        toast()->success('User berhasil disimpan');
        return redirect()->route('manajemen-user.users.index');
    }
    
    public function destroy(String $id)
    {
        $user = User::find($id);
        if (Auth::id() == $id) {
            toast()->error('Tidak bisa menghapus user yg sedang login');
            return redirect()->route('manajemen-user.users.index');
            
        }

        $user->delete();
        toast()->success('User berhasil dihapus');
        return redirect()->route('manajemen-user.users.index');
    }

    public function gantiPassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ],[
            'old_password.required' => 'Password saat ini harus diisi',
            'password.required' => 'Password baru harus diisi',
            'password.min' => 'Password baru minimal 8 karakter',
            'password.confirmed' => 'Konfirmasi password baru tidak sesuai',
        ]);

        $user = User::find(Auth::id());

        if (!Hash::check($request->old_password, $user->password)) {
            toast()->error('Password lama tidak sesuai');
            return redirect()->route('dashboard');
        }

        $user->update([
            'password' => Hash::make($request->password)
        ]);

        toast()->success('Password berhasil diubah');
        return redirect()->route('dashboard');
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);

        $user = User::find($request->id);
        $user->update([
            'password' => Hash::make('12345678')
        ]);

        toast()->success('Password berhasil direset menjadi 12345678');
        return redirect()->route('manajemen-user.users.index');
    }

}
