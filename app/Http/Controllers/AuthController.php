<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Guru;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('template.login');
    }

    public function login(Request $request)
{
    $request->validate([
        'email'    => 'required|email',
        'password' => 'required',
        'role'     => 'required'
    ]);

    $user = \App\Models\User::where('email', $request->email)->first();

    if (!$user) {
        return back()->withErrors(['email' => 'Akun tidak ditemukan']);
    }

    if ($user->role !== $request->role) {
        return back()->withErrors(['role' => 'Role tidak sesuai dengan akun']);
    }

    // CEK GURU HARUS PUNYA DATA DI TABEL GURU
    if ($user->role === 'guru') {
        if (!$user->guru) {
            return back()->withErrors(['email' => 'Guru belum terdaftar oleh admin']);
        }
    }

    if (!Auth::attempt($request->only('email', 'password'))) {
        return back()->withErrors(['email' => 'Email atau password salah']);
    }

    $request->session()->regenerate();

    return redirect()->route(
        $user->role === 'admin'
            ? 'dashboard.admin'
            : 'dashboard.guru'
    );
}


   
    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login'); // arahkan ke halaman login
    }
    
}
