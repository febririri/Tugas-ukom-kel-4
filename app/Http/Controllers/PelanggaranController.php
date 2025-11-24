<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggaran;
use App\Models\Siswa;
use Barryvdh\DomPDF\Facade\Pdf;

class PelanggaranController extends Controller
{
    // Halaman semua history pelanggaran (tabel utama)
    public function index()
    {
        $data = Pelanggaran::with('siswa')->get();
        return view('history_pelanggaran', compact('data'));
    }

    // Form tambah pelanggaran
    public function create()
    {
        $siswa = Siswa::all();
        return view('template.input_pelanggaran', compact('siswa'));
    }

    // Simpan pelanggaran baru
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

        return redirect()->route('history.pelanggaran')
            ->with('pesan_sukses', 'Berhasil menyimpan pelanggaran siswa');
    }

    // Edit pelanggaran
    public function edit($id)
    {
        $pelanggaran = Pelanggaran::findOrFail($id);
        $siswas = Siswa::all();
        return view('template.edit_pelanggaran', compact('pelanggaran', 'siswas'));
    }

    // Update pelanggaran
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

        return redirect()->route('history.pelanggaran')
            ->with('pesan_sukses', 'Berhasil mengupdate pelanggaran siswa');
    }

    // Hapus pelanggaran
    public function destroy($id)
    {
        Pelanggaran::findOrFail($id)->delete();

        return redirect()->route('history.pelanggaran')
            ->with('pesan_sukses', 'Berhasil menghapus data pelanggaran');
    }

    // Detail pelanggaran
    public function show($id)
    {
        $pelanggaran = Pelanggaran::with('siswa')->findOrFail($id);
        return view('template.detail_pelanggaran', compact('pelanggaran'));
    }

    // Cetak PDF
    public function cetak()
    {
        // Ambil semua pelanggaran beserta nama siswa
        $data = Pelanggaran::with('siswa')->get();

        // Buat PDF
        $pdf = Pdf::loadView('pdf.pelanggaran', compact('data'));

        return $pdf->stream('history-pelanggaran.pdf');
    }

    // History pelanggaran per siswa untuk dashboard guru
    public function historySiswa($siswa_id)
    {
        $siswa = Siswa::findOrFail($siswa_id);
        $data = Pelanggaran::where('siswa_id', $siswa_id)->get();

        return view('dashboard_guru_pelanggaran', compact('siswa', 'data'));
    }
}
