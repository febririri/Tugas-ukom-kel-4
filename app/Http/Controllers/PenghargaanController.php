<?php

namespace App\Http\Controllers;

use App\Models\Penghargaan;
use App\Models\Siswa;
use Illuminate\Http\Request;

class PenghargaanController extends Controller
{
    public function index()
    {
        $siswa = Siswa::orderBy('nama')->get();
        return view('template.penghargaan', compact('siswa'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'jenis_penghargaan' => 'required|string',
            'poin' => 'required|integer',
            'keterangan' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $foto = null;
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto')->store('penghargaan', 'public');
        }

        Penghargaan::create([
            'siswa_id' => $request->siswa_id,
            'jenis_penghargaan' => $request->jenis_penghargaan,
            'poin' => $request->poin,
            'keterangan' => $request->keterangan,
            'foto' => $foto
        ]);

        return back()->with('success', 'Penghargaan berhasil disimpan!');
    }
}
