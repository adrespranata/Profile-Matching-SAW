<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function LoginForm()
    {
        return view('auth.login', [
            "title" => "Login"
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate(
            [
                'username' => 'required',
                'password' => 'required'
            ],
            [
                'username.required' => 'Please enter your username!',
                'password.required' => 'Please enter your password!'
            ]
        );

        if (Auth::attempt($credentials)) {
            // Autentikasi berhasil
            $request->session()->regenerate();

            Auth::login(Auth::user(), true);

            $namaUser = Auth::user()->name;
            $pesan = "Selamat datang $namaUser! Anda bisa mengoperasikan sistem dengan wewenang tertentu melalui pilihan menu yang ada di bawah!";
            return redirect()->intended('/')->with('success', $pesan);
        } else {
            // Autentikasi gagal
            return back()->withErrors([
                'username' => 'Usename atau password salah.',
            ]);
        }

        return back()->with('LoginError', 'Login Gagal');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
