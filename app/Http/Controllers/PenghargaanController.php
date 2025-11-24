<?php

namespace App\Http\Controllers;

use App\Models\Penghargaan;
use App\Models\Siswa;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Str;

class PenghargaanController extends Controller
{
    // index (paginated list)
    public function index()
    {
       $penghargaans = Penghargaan::with('siswa')->latest()->paginate(15);
return view('penghargaan.index', compact('penghargaans'));
    }

    // show create form
     public function create()
{
   $siswa = \App\Models\Siswa::all();

 return view('penghargaan.create', compact('siswa'));
}

    // store new penghargaan
    public function store(Request $request)
{
    $validated = $request->validate([
        'siswa_id' => 'required|exists:siswa,id',
        'nama_penghargaan' => 'required|string|max:255',
        'deskripsi' => 'nullable|string',
        'tanggal' => 'required|date',
        'bukti_foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
    ]);

    // Upload file jika ada
    if ($request->hasFile('bukti_foto')) {
        $file = $request->file('bukti_foto');
        $namaFile = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads/penghargaan'), $namaFile);
        $validated['bukti_foto'] = $namaFile;
    }

    Penghargaan::create($validated);

    return redirect()->route('penghargaan.index')
        ->with('success', 'Data penghargaan berhasil ditambahkan!');
}

    // edit form
    public function edit($id)
    {
        $penghargaan = Penghargaan::findOrFail($id);
        $siswa = Siswa::all();
        return view('penghargaan.edit_penghargaan', compact('penghargaan', 'siswa', 'guru'));
    }

    // update
    public function update(Request $request, $id)
    {
        $penghargaan = Penghargaan::findOrFail($id);

        $validated = $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'nama_penghargaan' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'bukti_foto' => 'nullable|image|max:2048',
            'tanggal' => 'required|date',
        ]);

        if ($request->hasFile('bukti_foto')) {
            if ($penghargaan->bukti_foto && file_exists(public_path($penghargaan->bukti_foto))) {
                @unlink(public_path($penghargaan->bukti_foto));
            }
            $file = $request->file('bukti_foto');
            $filename = Str::random(12) . '_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/penghargaan'), $filename);
            $validated['bukti_foto'] = 'uploads/penghargaan/' . $filename;
        }

        $penghargaan->update($validated);

        return redirect()->route('penghargaan.index')->with('success', 'Penghargaan berhasil diupdate.');
    }

    // delete
    public function destroy($id)
    {
        $penghargaan = Penghargaan::findOrFail($id);
        if ($penghargaan->bukti_foto && file_exists(public_path($penghargaan->bukti_foto))) {
            @unlink(public_path($penghargaan->bukti_foto));
        }
        $penghargaan->delete();
        return redirect()->route('penghargaan.index')->with('success', 'Penghargaan berhasil dihapus.');
    }

    // history view
   public function history($id)
{
    // Ambil data siswa
    $siswa = Siswa::findOrFail($id);
}

    // generate PDF of history
    public function historyPdf($id)
{
    $siswa = \App\Models\Siswa::find($id);

    if (!$siswa) {
        return redirect()->back()->with('error', 'Siswa dengan ID ' . $id . ' tidak ditemukan.');
    }

    $data = \App\Models\Penghargaan::with('guru')
                ->where('siswa_id', $id)
                ->orderBy('tanggal', 'desc')
                ->get();

    if ($data->isEmpty()) {
        return redirect()->back()->with('error', 'Tidak ada data penghargaan untuk siswa ini.');
    }

    $pdf = PDF::loadView('pdf_history_penghargaan', compact('siswa', 'data'));
    return $pdf->download("Riwayat_Penghargaan_{$siswa->nama}.pdf");
}


}
