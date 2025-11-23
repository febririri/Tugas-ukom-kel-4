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

    $guru = $user->guru;

    if (!$guru) {
        abort(403, 'Data guru tidak ditemukan');
    }

    // DATA SISWA + JUMLAH PELANGGARAN
    $siswas = \App\Models\Siswa::with('pelanggaran')->get();

    foreach ($siswas as $siswa) {
        $siswa->pelanggaran_sum = $siswa->pelanggaran->count();
    }

    // DATA TOP PELANGGARAN
    $topPelanggaran = [
        'Tidak Memasukkan Baju – 5x',
        'Meninggalkan Kelas Tanpa Izin – 3x',
        'Tidak Mengikuti Upacara – 2x',
        'Berkata Kotor ke Guru – 2x',
        'Tidak Mengikuti Pelajaran – 2x',
    ];

    // DATA GRAFIK
    $grafikLabels = ['Jan','Feb','Mar','Apr','Mei','Jun'];
    $grafikData = [30,45,28,60,40,70];

    return view('template.dashboard_guru', compact(
        'guru',
        'user',
        'siswas',
        'topPelanggaran',
        'grafikLabels',
        'grafikData'
    ));
}



}
