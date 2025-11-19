<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SanksiPelanggaran;

class SanksiPelanggaranController extends Controller
{
    public function index()
    {
        $sanksi = SanksiPelanggaran::all();
        return view('template.sanksi_pelanggaran', compact('sanksi'));
    }

    public function create()
    {
        return view('template.tambah_sanksi');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kriteria_pelanggaran' => 'required',
            'poin_dari' => 'required|integer',
            'poin_sampai' => 'required|integer',
            'sanksi' => 'required',
        ]);

        SanksiPelanggaran::create([
            'kriteria_pelanggaran' => $request->kriteria_pelanggaran,
            'poin_dari' => $request->poin_dari,
            'poin_sampai' => $request->poin_sampai,
            'sanksi' => $request->sanksi,
        ]);

        return redirect()->route('sanksi.pelanggaran')
            ->with('success', 'Sanksi berhasil ditambahkan!');
    }
}