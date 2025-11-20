<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index()
    {
        $guru = Guru::all();
        return view('template.guru', compact('guru'));
    }

    public function create()
    {
        return view('template.tambah_guru');
    }

   public function store(Request $request)
{
  $request->validate([
        'nama' => 'required',
        'nip' => 'required'
    ]);

    Guru::create([
        'nama' => $request->nama,
        'nip' => $request->nip
    ]);

    return redirect()->route('guru.index')->with('success', 'Guru berhasil ditambahkan!');
}

    public function edit($id)
    {
        $guru = Guru::findOrFail($id);
        return view('template.edit_guru', compact('guru'));
    }

   public function update(Request $request, $id)
{
    $request->validate([
        'nama' => 'required',
        'nip' => 'required'  
    ]);

    Guru::where('id', $id)->update([
        'nama' => $request->nama,
        'nip' => $request->nip
    ]);

    return redirect()->route('guru.index')->with('success', 'Data guru berhasil diupdate!');
}
    public function destroy($id)
    {
        Guru::where('id', $id)->delete();
        return redirect()->route('guru')->with('success', 'Data guru berhasil dihapus!');
    }
}
