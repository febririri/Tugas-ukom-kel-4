<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BentukController extends Controller
{
    public function edit($id)
{
    $bentuk = DB::table('bentuk_pelanggaran')->where('id', $id)->first();
    $kategori = DB::table('kategori_pelanggaran')->where('id', $bentuk->id_kategori_pelanggaran)->first();

    return view('template.edit_bentuk', compact('bentuk', 'kategori'));
}

    // tampilkan form tambah bentuk
    public function create($id)
    {
        $kategori = DB::table('kategori_pelanggaran')->where('id', $id)->first();
        
        return view('template.tambah_bentuk', compact('kategori'));
    }

    // halaman daftar bentuk pelanggaran berdasarkan kategori
    public function index($id)
    {
        $kategori = DB::table('kategori_pelanggaran')->where('id', $id)->first();

        $bentuk = DB::table('bentuk_pelanggaran')
                    ->where('id_kategori_pelanggaran', $id)
                    ->get();

        return view('template.bentuk_pelanggaran', compact('kategori', 'bentuk'));
    }

    public function update(Request $request, $id)
{
    DB::table('bentuk_pelanggaran')
        ->where('id', $id)
        ->update([
            'nama_bentuk' => $request->nama_bentuk,
            'poin' => $request->poin,
            'updated_at' => now()
        ]);

    return redirect('/bentuk/' . $request->id_kategori_pelanggaran)
        ->with('success', 'Bentuk pelanggaran berhasil diupdate!');
}

    // simpan bentuk pelanggaran
   public function store(Request $request)
{
    
    DB::table('bentuk_pelanggaran')->insert([
        'id_kategori_pelanggaran' => $request->id_kategori_pelanggaran,
        'nama_bentuk' => $request->nama_bentuk,
        'poin' => $request->poin,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    // Hitung ulang total bentuk
    $totalBentuk = DB::table('bentuk_pelanggaran')
        ->where('id_kategori_pelanggaran', $request->id_kategori_pelanggaran)
        ->count();

    // Update ke kategori
    DB::table('kategori_pelanggaran')
        ->where('id', $request->id_kategori_pelanggaran)
        ->update(['jumlah_bentuk' => $totalBentuk]);

    return redirect('/bentuk/' . $request->id_kategori_pelanggaran)
        ->with('success', 'Bentuk pelanggaran berhasil ditambahkan!');
}


    // hapus bentuk pelanggaran
   public function destroy($id)
{
    // Ambil kategori dari bentuk yang akan dihapus
    $bentuk = DB::table('bentuk_pelanggaran')->where('id', $id)->first();
    $kategoriId = $bentuk->id_kategori_pelanggaran;

    // Hapus bentuk
    DB::table('bentuk_pelanggaran')->where('id', $id)->delete();

    // Hitung ulang total bentuk
    $totalBentuk = DB::table('bentuk_pelanggaran')
        ->where('id_kategori_pelanggaran', $kategoriId)
        ->count();

    // Update kategori
    DB::table('kategori_pelanggaran')
        ->where('id', $kategoriId)
        ->update(['jumlah_bentuk' => $totalBentuk]);

    return back()->with('success', 'Bentuk pelanggaran berhasil dihapus!');
}

}
