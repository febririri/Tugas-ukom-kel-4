<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Kelas;

class SiswaController extends Controller
{
    // Halaman Form Tambah Siswa
    public function create($id)
    {
        $kelas = Kelas::findOrFail($id);

        return view('template.tambah_siswa', compact('kelas'));
    }

    // Proses Simpan
    public function store(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'nis'  => 'required',
            'foto' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $kelas = Kelas::findOrFail($id);

        // Upload foto
        $filename = null;
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('foto_siswa'), $filename);
        }

        // Simpan siswa TANPA kelas_id
        Siswa::create([
            'nama'  => $request->nama,
            'nis'   => $request->nis,
            'kelas' => $kelas->nama_kelas, // ← disimpan sebagai string
            'foto'  => $filename
        ]);

        return redirect()->route('kelas.siswa', $id)
            ->with('success', 'Data siswa berhasil ditambahkan!');
    }
}