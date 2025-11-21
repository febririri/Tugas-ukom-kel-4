<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            'role'     => 'required',
        ]);

        // Ambil data sesuai input login
        $credentials = $request->only('email', 'password', 'role');

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();

            // Cek role
            if (Auth::user()->role === 'admin') {
                return redirect()->route('dashboard.admin');
            }

            if (Auth::user()->role === 'guru') {
                return redirect()->route('dashboard.guru');
            }

            return redirect('/');
        }

        return back()->withErrors([
            'email' => 'Email, password, atau role salah',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
