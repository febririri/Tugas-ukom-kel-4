<?php

namespace App\Http\Controllers;

use App\Models\Pelanggaran;
use App\Models\History;
use Illuminate\Http\Request;

class PelanggaranController extends Controller
{
    // Tampilkan halaman history
    public function index()
    {
        // Ambil data dari tabel history
        $data = History::latest()->get();
        return view('history_pelanggaran', compact('data'));
    }

    // Form input pelanggaran
    public function create()
    {
        return view('template.input_pelanggaran');
    }

    // Simpan pelanggaran + history
    public function store(Request $request)
    {
        $request->validate([
            'nama_siswa' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'jenis_pelanggaran' => 'required',
            'bentuk_pelanggaran' => 'required',
            'poin' => 'required|integer',
            'bukti' => 'nullable|file|max:5000'
        ]);

        $fileName = null;

        // Upload gambar bukti
        if ($request->hasFile('bukti')) {
            $fileName = time() . '_' . $request->bukti->getClientOriginalName();
            $request->bukti->storeAs('bukti', $fileName, 'public');
        }

        // 🔵 Simpan ke tabel pelanggaran
        Pelanggaran::create([
            'nama_siswa' => $request->nama_siswa,
            'kelas' => $request->kelas,
            'jurusan' => $request->jurusan,
            'jenis_pelanggaran' => $request->jenis_pelanggaran,
            'bentuk_pelanggaran' => $request->bentuk_pelanggaran,
            'poin' => $request->poin,
            'keterangan' => $request->keterangan,
            'bukti' => $fileName
        ]);

        // 🔵 Simpan juga ke tabel history
        History::create([
            'nama_siswa' => $request->nama_siswa,
            'kelas' => $request->kelas,
            'jurusan' => $request->jurusan,
            'jenis_pelanggaran' => $request->jenis_pelanggaran,
            'bentuk_pelanggaran' => $request->bentuk_pelanggaran,
            'poin' => $request->poin,
            'keterangan' => $request->keterangan,
            'bukti' => $fileName
        ]);

        return redirect()->route('history.pelanggaran')
            ->with('success', 'Pelanggaran berhasil disimpan!');
    }
}
