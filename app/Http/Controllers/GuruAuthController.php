<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class GuruAuthController extends Controller
{
    // FORM LOGIN
    public function loginForm()
    {
        return view('guru.login');
    }

    // PROSES LOGIN GURU
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $guru = Guru::where('email', $request->email)->first();

        if (!$guru) {
            return back()->withErrors(['email' => 'Guru tidak terdaftar di admin!']);
        }

        if (!Hash::check($request->password, $guru->password)) {
            return back()->withErrors(['password' => 'Password salah!']);
        }

        // SIMPAN SESI LOGIN
        session(['guru' => $guru]);

        return redirect()->route('guru.dashboard');
    }

    // DASHBOARD
    public function dashboard()
    {
        $guru = session('guru');

        return view('template.dashboard_guru', compact('guru'));
    }

    // LOGOUT
    public function logout()
    {
        session()->forget('guru');
        return redirect()->route('guru.login');
    }
}
