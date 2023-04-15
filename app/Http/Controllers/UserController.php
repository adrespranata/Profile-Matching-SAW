<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        // Join tabel users, role_user, dan roles
        $users = DB::table('users')
            ->join('roles', 'users.role_id', '=', 'roles.id')
            ->select('users.id', 'users.name', 'users.username', 'users.email', 'roles.name as role')
            ->where('users.id', '<>', Auth::id())
            ->get();

        return view('user.index', [
            "title" => "Data User",
            'users' => $users
        ]);
    }


    public function create()
    {
        $roles = Role::all();
        return view('user.create', compact('roles'), [
            "title" => "Tambah Data Pengguna"
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'username' => 'required|string|max:255|unique:users,username',
            'password' => 'required|string|min:5|confirmed',
            'role_id' => 'required|exists:roles,id',
        ]);

        // Buat objek user baru dan simpan ke database
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->role_id = $request->role_id;
        $user->save();

        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $users = User::find($id);
        $roles = Role::all();

        return view('user.edit', compact('users', 'roles'), [
            "title" => "Edit User"
        ]);
    }

    public function update(Request $request, $id)
    {
        // Validasi input dari pengguna
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'username' => 'required|unique:users,username,' . $id,
            'password' => 'nullable|min:6',
            'role_id' => 'required|exists:roles,id',
        ]);

        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->username = $request->input('username');
        if ($request->has('password')) {
            $user->password = bcrypt($request->input('password'));
        }
        $user->role_id = $request->input('role_id');
        $user->save();


        return redirect()->route('user.index')->with('success', 'User has been updated.');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if (!$user) {
            return back()->with('error', 'User not found');
        }
        $user->delete(); // menghapus user dari tabel users
        return redirect()->route('user.index')->with('success', 'User deleted successfully');
    }
}
