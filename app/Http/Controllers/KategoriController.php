<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\KategoriPelanggaran as Kategori;

class KategoriController extends Controller
{
    

    public function edit($id)
{
    $kategori = Kategori::findOrFail($id);
    return view('template.edit_kategori_pelanggaran', compact('kategori'));
}

 public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        return redirect()->route('kategori.pelanggaran')->with('success', 'Kategori berhasil dihapus');
    }
public function hapus($id)
{
    Kategori::findOrFail($id)->delete();
    return redirect()->back()->with('success', 'Kategori berhasil dihapus');
}

public function update(Request $request, $id)
{
    Kategori::findOrFail($id)->update([
        'nama_kategori' => $request->nama_kategori,
    ]);

    return redirect()->route('kategori.pelanggaran')
        ->with('success', 'Data kategori berhasil diupdate');
}

    // =======================
    // TAMPILKAN DATA KATEGORI
    // =======================
    public function index()
{
    $kategori = DB::table('kategori_pelanggaran')
        ->leftJoin(
            'bentuk_pelanggaran',
            'kategori_pelanggaran.id',
            '=',
            'bentuk_pelanggaran.id_kategori_pelanggaran'
        )
        ->select(
            'kategori_pelanggaran.id',
            'kategori_pelanggaran.nama_kategori',
            DB::raw('COUNT(bentuk_pelanggaran.id) as bentuk_count')
        )
        ->groupBy(
            'kategori_pelanggaran.id',
            'kategori_pelanggaran.nama_kategori'
        )
        ->get();

    return view('template.kategori_pelanggaran', compact('kategori'));
}

    // =======================
    // SIMPAN DATA KATEGORI
    // =======================
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required',
        ]);

        DB::table('kategori_pelanggaran')->insert([
            'nama_kategori' => $request->nama_kategori,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Kategori berhasil ditambahkan!');
    }
}
