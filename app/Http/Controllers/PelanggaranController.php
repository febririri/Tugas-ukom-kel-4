<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggaran;
use App\Models\Siswa;

class PelanggaranController extends Controller
{
    // Halaman history tabel pelanggaran (hanya tabel!)
    public function index()
    {
        $data = Pelanggaran::with('siswa')->get();
        return view('history_pelanggaran', compact('data'));
    }

    // Halaman input pelanggaran (form)
    public function create()
    {
        $siswa = Siswa::all();
        return view('template.input_pelanggaran', compact('siswa'));
    }

    // Simpan data pelanggaran siswa
    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required',
            'kelas' => 'required',
            'bentuk_pelanggaran' => 'required',
            'keterangan' => 'nullable',
            'bukti' => 'nullable|file|mimes:jpg,jpeg,png,mp4,pdf|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('bukti')) {
            $data['bukti'] = $request->file('bukti')->store('pelanggaran_bukti', 'public');
        }

        Pelanggaran::create($data);

        return redirect()->route('history.pelanggaran')->with('pesan_sukses', 'Berhasil menyimpan pelanggaran siswa');
    }

    // Halaman edit data pelanggaran siswa
    public function edit($id)
    {
        $pelanggaran = Pelanggaran::findOrFail($id);
        $siswas = Siswa::all();
        return view('template.edit_pelanggaran', compact('pelanggaran', 'siswas'));
    }

    // Update data pelanggaran siswa setelah edit
    public function update(Request $request, $id)
    {
        $request->validate([
            'siswa_id' => 'required',
            'kelas' => 'required',
            'bentuk_pelanggaran' => 'required',
            'keterangan' => 'nullable',
            'bukti' => 'nullable|file|mimes:jpg,jpeg,png,mp4,pdf|max:2048',
        ]);

        $pelanggaran = Pelanggaran::findOrFail($id);

        $data = $request->all();

        if ($request->hasFile('bukti')) {
            $data['bukti'] = $request->file('bukti')->store('pelanggaran_bukti', 'public');
        }

        $pelanggaran->update($data);

        return redirect()->route('history.pelanggaran')->with('pesan_sukses', 'Berhasil mengupdate pelanggaran siswa');
    }

    // Hapus data pelanggaran siswa
    public function destroy($id)
    {
        Pelanggaran::findOrFail($id)->delete();
        return redirect()->route('history.pelanggaran')->with('pesan_sukses', 'Berhasil menghapus data pelanggaran');
    }
}
