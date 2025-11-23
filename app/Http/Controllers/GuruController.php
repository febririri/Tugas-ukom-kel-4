<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class GuruController extends Controller
{
    public function index()
    {
        $gurus = Guru::all();
        return view('template.guru', compact('gurus'));
    }


    public function create()
    {
        return view('template.tambah_guru');
    }

public function store(Request $request)
{
    $request->validate([
        'nama' => 'required',
        'nip'  => 'nullable',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6'
    ]);

    // 1. SIMPAN USER DULU
    $user = \App\Models\User::create([
        'name' => $request->nama,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'role' => 'guru'
    ]);

    // 2. SIMPAN DATA GURU
    Guru::create([
        'user_id' => $user->id,
        'nama' => $request->nama,
        'nip'  => $request->nip,
        'plain_password' => $request->password
    ]);

    return redirect()->route('guru.index')->with('success','Guru baru berhasil dibuat');
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
        'nip'  => 'nullable',
        'email' => 'required|email',
        'password' => 'nullable'
    ]);

    $guru = Guru::findOrFail($id);
    $user = $guru->user;

    // update user
    $user->email = $request->email;
    $user->name  = $request->nama;

    if ($request->password) {
        $user->password = bcrypt($request->password);
        $guru->plain_password = $request->password;
    }

    $user->save();

    // update guru
    $guru->nama = $request->nama;
    $guru->nip  = $request->nip;
    $guru->save();

    return redirect()->route('guru.index')->with('success','Data guru diperbarui');
}


    public function destroy($id)
    {
        $guru = Guru::findOrFail($id);
        $guru->delete();

        return redirect()->route('guru.index')->with('success','Guru dihapus');
    }
}
