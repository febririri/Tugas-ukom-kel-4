<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SanksiPelanggaran;

class SanksiPelanggaranController extends Controller
{
    public function index()
{
    $sanksi = SanksiPelanggaran::all();

    // Ambil role user yang login
    $role = auth()->user()->role;

    if ($role == 'admin') {
        // Admin bisa tambah/edit/hapus
        return view('template.sanksi_pelanggaran', compact('sanksi'));
    } else {
        // Guru/user lain hanya lihat read-only
        return view('template.sanksi', compact('sanksi'));
    }
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

        SanksiPelanggaran::create($request->all());

        return redirect()->route('sanksi.pelanggaran')
            ->with('success', 'Sanksi berhasil ditambahkan!');
    }

    // ================================
    //             EDIT
    // ================================
    public function edit($id)
    {
        $sanksi = SanksiPelanggaran::findOrFail($id);
        return view('template.edit_sanksi', compact('sanksi'));
    }

    // ================================
    //            UPDATE
    // ================================
    public function update(Request $request, $id)
    {
        $request->validate([
            'kriteria_pelanggaran' => 'required',
            'poin_dari' => 'required|integer',
            'poin_sampai' => 'required|integer',
            'sanksi' => 'required',
        ]);

        SanksiPelanggaran::where('id', $id)->update([
            'kriteria_pelanggaran' => $request->kriteria_pelanggaran,
            'poin_dari' => $request->poin_dari,
            'poin_sampai' => $request->poin_sampai,
            'sanksi' => $request->sanksi,
        ]);

        return redirect()->route('sanksi.pelanggaran')
            ->with('success', 'Data berhasil diperbarui!');
    }

    // ================================
    //            DELETE
    // ================================
    public function destroy($id)
    {
        SanksiPelanggaran::destroy($id);

        return redirect()->route('sanksi.pelanggaran')
            ->with('success', 'Data berhasil dihapus!');
    }
}
