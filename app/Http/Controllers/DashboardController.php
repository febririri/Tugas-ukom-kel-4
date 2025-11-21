<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function admin()
    {
        return view('dashboard.admin');
    }

    public function guru()
    {
        $user = Auth::user();
        $guru = $user->guru; // mengambil data guru berdasarkan user yang login
        return view('dashboard.guru', compact('guru'));
    }
}
