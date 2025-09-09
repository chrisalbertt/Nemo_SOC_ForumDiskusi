<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }

    public function registerForm()
    {
        return view('auth.register');
    }

    public function loginPost(Request $r)
    {
        $r->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $u = User::where('username', $r->username)->first();

        if (!$u || !Hash::check($r->password, $u->password)) {
            return back()->with('err', 'Login gagal');
        }

        session([
            'user_id'  => $u->id_users,
            'nama'     => $u->nama_lengkap,
            'username' => $u->username,
            'role'     => $u->role
        ]);

        return $u->role === 'ADMIN'
            ? redirect()->route('admin.dashboard')->with('ok','Login berhasil sebagai Admin')
            : redirect()->route('user.dashboard')->with('ok','Login berhasil');
    }

    public function registerPost(Request $r)
    {
        $r->validate([
            'nama_lengkap' => 'required',
            'username'     => 'required|unique:users,username', // <— users (lowercase)
            'password'     => 'required|min:4'
        ]);

        User::create([
            'nama_lengkap' => $r->nama_lengkap,
            'username'     => $r->username,
            'password'     => Hash::make($r->password), // ganti ke plain kalau mau pentest
            'role'         => 'USER'
        ]);

        return redirect()->route('login')->with('ok', 'Registrasi berhasil. Silakan login.');
    }

    public function logout()
    {
        session()->flush();
        return redirect()->route('login')->with('ok', 'Logout berhasil');
    }
}
