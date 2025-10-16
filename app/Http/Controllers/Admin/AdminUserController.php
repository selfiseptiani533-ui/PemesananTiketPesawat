<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    // Menampilkan semua user
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->get();
        return view('admin.user.index', compact('users'));
    }

    // Menampilkan form tambah user
    public function create()
    {
        return view('admin.user.create');
    }

    // Menyimpan user baru
    public function store(Request $request)
    {
        $request->validate([
            'name'           => 'required|string|max:100',
            'nama_lengkap'   => 'required|string|max:255',
            'email'          => 'required|email|unique:users',
            'password'       => 'required|min:6',
            'role'           => 'required|in:admin,user',
            'no_hp'          => 'nullable|string|max:20',
            'alamat'         => 'nullable|string|max:255',
            'tanggal_lahir'  => 'nullable|date'
        ]);

        User::create([
            'name'           => $request->name,
            'nama_lengkap'   => $request->nama_lengkap,
            'email'          => $request->email,
            'password'       => Hash::make($request->password),
            'role'           => $request->role,
            'no_hp'          => $request->no_hp,
            'alamat'         => $request->alamat,
            'tanggal_lahir'  => $request->tanggal_lahir,
        ]);

        return redirect()->route('admin.user.index')->with('success', 'User berhasil ditambahkan.');
    }

    // Menampilkan form edit user
    public function edit(User $user)
    {
        return view('admin.user.edit', compact('user'));
    }

    // Update data user
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'           => 'required|string|max:100',
            'nama_lengkap'   => 'required|string|max:255',
            'email'          => 'required|email|unique:users,email,'.$user->id,
            'role'           => 'required|in:admin,user',
            'no_hp'          => 'nullable|string|max:20',
            'alamat'         => 'nullable|string|max:255',
            'tanggal_lahir'  => 'nullable|date'
        ]);

        $data = $request->only([
            'name', 'nama_lengkap', 'email', 'role', 'no_hp', 'alamat', 'tanggal_lahir'
        ]);

        // Update password hanya jika diisi
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('admin.user.index')->with('success', 'User berhasil diperbarui.');
    }

    // Hapus user
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.user.index')->with('success', 'User berhasil dihapus.');
    }
}
