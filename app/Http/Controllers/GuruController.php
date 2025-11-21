<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class GuruController extends Controller
{
  public function index()
{
    $gurus = Guru::with('user')->get();
    return view('admin.guru.index', compact('gurus'));
}


    public function create()
    {
        return view('guru.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nip'  => 'nullable',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'foto' => 'nullable|image|max:2048',
        ]);

        // buat user
        $user = User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'guru',
        ]);

        $fotoName = null;
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fotoName = time().'_'.Str::slug($request->nama).'_'.$file->getClientOriginalName();
            $file->move(public_path('foto_guru'), $fotoName);
        }

        Guru::create([
            'user_id' => $user->id,
            'nama' => $request->nama,
            'nip'  => $request->nip,
            'foto' => $fotoName,
        ]);

        return redirect()->route('guru.index')->with('success','Guru berhasil ditambahkan');
    }

    public function edit($id)
    {
        $guru = Guru::findOrFail($id);
        return view('guru.edit', compact('guru'));
    }

    public function update(Request $request, $id)
    {
        $guru = Guru::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'nip'  => 'nullable',
            'foto' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fotoName = time().'_'. $file->getClientOriginalName();
            $file->move(public_path('foto_guru'), $fotoName);
            $guru->foto = $fotoName;
        }

        $guru->nama = $request->nama;
        $guru->nip = $request->nip;
        $guru->save();

        // sync name to user (optional)
        if ($guru->user) {
            $guru->user->name = $request->nama;
            $guru->user->save();
        }

        return redirect()->route('guru.index')->with('success','Data guru diperbarui');
    }

    public function destroy($id)
    {
        $guru = Guru::findOrFail($id);
        if ($guru->user) {
            $guru->user->delete(); // hapus user juga (opsional)
        } else {
            $guru->delete();
        }
        return redirect()->route('guru.index')->with('success','Guru dihapus');
    }
}
