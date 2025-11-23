<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Guru;

class SiswaController extends Controller
{
    // Halaman detail siswa
    public function show($id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('template.detail_siswa', compact('siswa'));
    }

    // List semua siswa
    public function index()
    {
        $siswa = Siswa::all();
        return view('template.siswa', compact('siswa'));
    }

    // HALAMAN FORM TAMBAH
    public function create($id)
    {
        $kelas = Kelas::findOrFail($id);
        return view('template.tambah_siswa', compact('kelas'));
    }

    // SIMPAN
    public function store(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'nis'  => 'required',
            'foto' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);
        $kelas = Kelas::findOrFail($id);
        $filename = null;
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('foto_siswa'), $filename);
        }
        Siswa::create([
            'nama'  => $request->nama,
            'nis'   => $request->nis,
            'kelas' => $kelas->nama_kelas,
            'foto'  => $filename
        ]);
        return redirect()->route('kelas.siswa', $id)
            ->with('success', 'Data siswa berhasil ditambahkan!');
    }

    // FORM EDIT
    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        $kelas = Kelas::all();
        return view('template.edit_siswa', compact('siswa', 'kelas'));
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'nis' => 'required',
            'kelas' => 'required',
            'foto' => 'nullable|image|mimes:png,jpg,jpeg|max:2048'
        ]);
        $siswa = Siswa::findOrFail($id);
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('foto_siswa'), $filename);
            $siswa->foto = $filename;
        }
        $siswa->nama = $request->nama;
        $siswa->nis = $request->nis;
        $siswa->kelas = $request->kelas;
        $siswa->save();

        // Cari kelas ID berdasarkan nama kelas siswa
        $kelasId = Kelas::where('nama_kelas', $siswa->kelas)->value('id');
        return redirect()->route('kelas.siswa', $kelasId)
            ->with('success', 'Data siswa berhasil diperbarui!');
    }

    // HAPUS
    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        if ($siswa->foto && file_exists(public_path('foto_siswa/' . $siswa->foto))) {
            unlink(public_path('foto_siswa/' . $siswa->foto));
        }
        $siswa->delete();
        return back()->with('success', 'Siswa berhasil dihapus!');
    }

    // DASHBOARD GURU TAMBAHAN
    public function dashboardGuru()
{
    $user = auth()->user(); 
    $guru = Guru::where('user_id', $user->id)->first();

    $siswas = Siswa::with('pelanggaran')->get();

    foreach ($siswas as $siswa) {
        $siswa->pelanggaran_sum = $siswa->pelanggaran->count();
    }

    $topPelanggaran = [
        'Tidak Memasukkan Baju – 5x',
        'Meninggalkan Kelas Tanpa Izin – 3x',
        'Tidak Mengikuti Upacara – 2x',
        'Berkata Kotor ke Guru – 2x',
        'Tidak Mengikuti Pelajaran – 2x',
    ];

    $grafikLabels = ['Jan','Feb','Mar','Apr','Mei','Jun'];
    $grafikData = [30,45,28,60,40,70];

    return view('template.dashboard_guru', compact(
        'siswas', 'guru', 'user',
        'topPelanggaran', 'grafikLabels', 'grafikData'
    ));
}

}
