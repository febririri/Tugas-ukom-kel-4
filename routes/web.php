<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| HALAMAN UTAMA
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('index');
});

/*
|--------------------------------------------------------------------------
| LOGIN
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

/*
|--------------------------------------------------------------------------
| DASHBOARD
|--------------------------------------------------------------------------
*/
Route::get('/dashboard-admin', fn() => view('template.dashboard_admin'))
    ->middleware('auth')->name('dashboard.admin');

Route::get('/dashboard-guru', fn() => view('template.dashboard_guru'))
    ->middleware('auth')->name('dashboard.guru');

Route::get('/penghargaan', fn() => view('template.penghargaan'))->name('penghargaan');


/*
|--------------------------------------------------------------------------
| KATEGORI PELANGGARAN (JSON)
|--------------------------------------------------------------------------
*/
// Tampil kategori + jumlah bentuk pelanggaran
Route::get('/kategori_pelanggaran', function () {

    $pathKategori = public_path('kategori.json');
    $pathBentuk   = public_path('bentuk_pelanggaran.json');

    $kategori = file_exists($pathKategori) ? json_decode(file_get_contents($pathKategori), true) : [];
    $bentuk   = file_exists($pathBentuk)   ? json_decode(file_get_contents($pathBentuk), true)   : [];

    // Tambahkan jumlah bentuk pelanggaran ke tiap kategori
    foreach ($kategori as &$row) {
        $row['jumlah_bentuk'] = collect($bentuk)
            ->where('kategori', $row['nama_kategori'])
            ->count();
    }

    return view('template.kategori_pelanggaran', compact('kategori'));
})->name('kategori.pelanggaran');

// Simpan kategori baru
Route::post('/kategori/tambah', function () {
    $path = public_path('kategori.json');
    $existing = file_exists($path) ? json_decode(file_get_contents($path), true) : [];

    $data = [
        'id' => time(),
        'nama_kategori' => request('nama_kategori'),
    ];

    $existing[] = $data;
    file_put_contents($path, json_encode($existing, JSON_PRETTY_PRINT));

    return redirect()->route('kategori.pelanggaran')->with('success', 'Kategori berhasil ditambahkan!');
})->name('kategori.simpan');

/*
|--------------------------------------------------------------------------
| BENTUK PELANGGARAN
|--------------------------------------------------------------------------
*/
// Tampil list bentuk pelanggaran
Route::get('/bentuk_pelanggaran/{kategori}', function ($kategori) {
    $path = public_path('bentuk_pelanggaran.json');
    $all = file_exists($path) ? json_decode(file_get_contents($path), true) : [];
    $bentuk = collect($all)->where('kategori', $kategori)->values()->all();
    return view('template.bentuk_pelanggaran', compact('kategori', 'bentuk'));
});

// Form tambah bentuk pelanggaran
Route::get('/tambah_bentuk/{kategori}', function ($kategori) {
    return view('template.tambah_bentuk', compact('kategori'));
});

// Simpan bentuk pelanggaran
Route::post('/tambah_bentuk/{kategori}', function ($kategori) {

    $path = public_path('bentuk_pelanggaran.json');
    $existing = file_exists($path) ? json_decode(file_get_contents($path), true) : [];

    $data = [
        'kategori'    => $kategori,
        'nama_bentuk' => request('nama_bentuk'),
        'poin'        => request('poin'),
    ];

    $existing[] = $data;
    file_put_contents($path, json_encode($existing, JSON_PRETTY_PRINT));

    return redirect('/bentuk_pelanggaran/' . $kategori)->with('success', 'Bentuk pelanggaran berhasil ditambahkan!');
});

/*
|--------------------------------------------------------------------------
| SANKSI PELANGGARAN
|--------------------------------------------------------------------------
*/
Route::get('/sanksi_pelanggaran', function () {
    $path = public_path('sanksi_pelanggaran.json');
    $sanksi = file_exists($path) ? json_decode(file_get_contents($path), true) : [];
    return view('template.sanksi_pelanggaran', compact('sanksi'));
})->name('sanksi.pelanggaran');

Route::post('/sanksi/simpan', function () {
    $path = public_path('sanksi_pelanggaran.json');
    $existing = file_exists($path) ? json_decode(file_get_contents($path), true) : [];

    $data = [
        'kriteria_pelanggaran' => request('kriteria_pelanggaran'),
        'poin_dari'            => (int) request('poin_dari'),
        'poin_sampai'          => (int) request('poin_sampai'),
        'sanksi'               => request('sanksi'),
    ];

    $existing[] = $data;
    file_put_contents($path, json_encode($existing, JSON_PRETTY_PRINT));

    return redirect()->route('sanksi.pelanggaran')->with('success', 'Sanksi berhasil ditambahkan!');
})->name('sanksi.simpan');

/*
|--------------------------------------------------------------------------
| DATA SISWA
|--------------------------------------------------------------------------
*/
Route::get('/siswa', function () {
    $path = public_path('siswa.json');
    $siswa = file_exists($path) ? json_decode(file_get_contents($path), true) : [];
    return view('template.siswa', compact('siswa'));
})->name('siswa');

Route::post('/siswa/simpan', function () {
    $path = public_path('siswa.json');
    $existing = file_exists($path) ? json_decode(file_get_contents($path), true) : [];
    $filename = null;

    if (request()->hasFile('foto')) {
        $file = request()->file('foto');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('foto_siswa'), $filename);
    }

    $data = [
        'nama'  => request('nama'),
        'nis'   => request('nis'),
        'kelas' => request('kelas'),
        'foto'  => $filename,
    ];

    $existing[] = $data;
    file_put_contents($path, json_encode($existing, JSON_PRETTY_PRINT));

    return redirect()->route('siswa')->with('success', 'Data siswa berhasil ditambahkan!');
});

/*
|--------------------------------------------------------------------------
| DATA GURU
|--------------------------------------------------------------------------
*/
Route::get('/guru', function () {
    $path = public_path('guru.json');

    $guru = file_exists($path) ? json_decode(file_get_contents($path), true) : [];

    return view('template.guru', compact('guru'));
})->name('guru');

// FORM TAMBAH GURU
Route::get('/tambah_guru', function () {
    return view('template.tambah_guru'); 
});


Route::post('/guru/simpan', function () {
    $path = public_path('guru.json');
    $existing = file_exists($path) ? json_decode(file_get_contents($path), true) : [];
    $filename = null;


    $data = [
        'nama'  => request('nama'),
        'nip'   => request('nip'),
      
    ];

    $existing[] = $data;
    file_put_contents($path, json_encode($existing, JSON_PRETTY_PRINT));

    return redirect()->route('guru')->with('success', 'Data guru berhasil ditambahkan!');
});
/*
|--------------------------------------------------------------------------
| LOGOUT
|--------------------------------------------------------------------------
*/
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
