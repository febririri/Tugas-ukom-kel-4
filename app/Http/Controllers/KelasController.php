<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;

class KelasController extends Controller
{
   public function index()
{
    // Ambil semua kelas + hitung jumlah siswa otomatis
    $kelas = Kelas::withCount('siswa')->get();

    return view('template.kelas', compact('kelas'));
}

    public function simpan(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required'
        ]);

        Kelas::create([
            'nama_kelas' => $request->nama_kelas
        ]);

        return redirect()->back()->with('success', 'Kelas berhasil ditambahkan');
    }

    public function edit($id)
    {
        $kelas = Kelas::findOrFail($id);
        return view('template.edit_kelas', compact('kelas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kelas' => 'required'
        ]);

        Kelas::where('id', $id)->update([
            'nama_kelas' => $request->nama_kelas
        ]);

        return redirect()->route('kelas.index')->with('success', 'Kelas berhasil diupdate');
    }

    public function hapus($id)
    {
        Kelas::destroy($id);
        return redirect()->back()->with('success', 'Kelas berhasil dihapus');
    }

    public function lihatSiswa($id)
    {
        $kelas = Kelas::findOrFail($id);
        $siswa = Siswa::where('kelas', $kelas->nama_kelas)->get();

        return view('template.siswa', compact('siswa', 'kelas'));
    }

    public function print($id)
    {
        return "Print kelas ID: " . $id;
    }
}