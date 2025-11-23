<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Guru;

class DashboardGuruController extends Controller
{
   public function index()
{
    $user = Auth::user();

    if ($user->role !== 'guru') {
        abort(403, 'Anda bukan guru');
    }

    $guru = $user->guru; // otomatis dari relasi

    if (!$guru) {
        abort(403, 'Data guru tidak ditemukan');
    }

    return view('template.dashboard_guru', compact('guru', 'user'));
}


}
