<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function showLogin()
    {
        return view('template.login'); // pastikan sesuai nama file blade kamu
    }

    // Proses login
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Cek apakah data cocok dengan database
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        // Kalau gagal
        return back()->withErrors([
            'email' => 'Email atau password salah!',
        ]);
    }

    // Halaman setelah login
    public function dashboard()
    {
        return view('template.dashboard'); // nanti kita buat file dashboard.blade.php
    }
}
