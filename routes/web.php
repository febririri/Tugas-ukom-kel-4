<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PelanggaranController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BentukController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SanksiPelanggaranController;
use App\Http\Controllers\KelasController;

/*
|--------------------------------------------------------------------------
| HALAMAN UTAMA
|--------------------------------------------------------------------------
*/
// Halaman utama

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

// Dashboard
Route::get('/dashboard-admin', function () {
    return view('template.dashboard_admin');
})->middleware('auth')->name('dashboard.admin');


Route::get('/dashboard-guru', fn() => view('template.dashboard_guru'))
    ->middleware('auth')->name('dashboard.guru');


Route::get('/penghargaan', fn() => view('template.penghargaan'))->name('penghargaan');


/*
|--------------------------------------------------------------------------
| KATEGORI PELANGGARAN (JSON)
|--------------------------------------------------------------------------
*/
// Halaman utama kategori pelanggaran (ambil dari database)
Route::get('/kategori_pelanggaran', [KategoriController::class, 'index'])
    ->name('kategori.pelanggaran');


// Simpan kategori baru ke database
Route::post('/kategori/tambah', [KategoriController::class, 'store'])
    ->name('kategori.simpan');

// Hapus kategori
Route::delete('/kategori/hapus/{id}', [KategoriController::class, 'destroy'])
    ->name('kategori.hapus');

// Edit kategori (tampilkan form)
Route::get('/kategori/edit/{id}', [KategoriController::class, 'edit'])
    ->name('kategori.edit');

// Update kategori
Route::post('/kategori/update/{id}', [KategoriController::class, 'update'])
    ->name('kategori.update');
/*
|--------------------------------------------------------------------------
| BENTUK PELANGGARAN (DATABASE)
|--------------------------------------------------------------------------
*/

// halaman daftar bentuk berdasarkan kategori
Route::get('/bentuk/{id}', [BentukController::class, 'index'])->name('bentuk.index');

// halaman tambah bentuk pelanggaran
Route::get('/bentuk/tambah/{id}', [BentukController::class, 'create'])->name('bentuk.create');

// simpan bentuk pelanggaran
Route::post('/bentuk/store', [BentukController::class, 'store'])->name('bentuk.store');

// hapus bentuk pelanggaran
Route::get('/bentuk/hapus/{id}', [BentukController::class, 'destroy'])->name('bentuk.delete');

// Form tambah bentuk
Route::get('/kategori/{id}/bentuk/tambah', [BentukController::class, 'create'])
    ->name('bentuk.tambah');



/*
|--------------------------------------------------------------------------
| SANKSI PELANGGARAN
|--------------------------------------------------------------------------
*/
// Halaman daftar sanksi
Route::get('/sanksi_pelanggaran', [SanksiPelanggaranController::class, 'index'])
    ->name('sanksi.pelanggaran');

// Halaman form tambah
Route::get('/sanksi/tambah', [SanksiPelanggaranController::class, 'create'])
    ->name('sanksi.tambah');

// Simpan ke database
Route::post('/sanksi/simpan', [SanksiPelanggaranController::class, 'store'])
    ->name('sanksi.simpan');

Route::get('/sanksi/edit/{id}', [SanksiPelanggaranController::class, 'edit'])
    ->name('sanksi.edit');

Route::delete('/sanksi/hapus/{id}', [SanksiPelanggaranController::class, 'destroy'])
    ->name('sanksi.hapus');


/*
|--------------------------------------------------------------------------
| DATA SISWA
|--------------------------------------------------------------------------
*/


// Tambah siswa harus diletakkan dulu 
Route::get('/kelas/{id}/siswa/create', [SiswaController::class, 'create'])
    ->name('siswa.create');

// Simpan siswa
Route::post('/kelas/{id}/siswa/simpan', [SiswaController::class, 'store'])
    ->name('kelas.siswa.simpan');

// Baru lihat siswa
Route::get('/kelas/{id}/siswa', [KelasController::class, 'lihatSiswa'])
    ->name('kelas.siswa');
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
| DATA KELAS
|--------------------------------------------------------------------------
*/
Route::get('/kelas', [KelasController::class, 'index'])->name('kelas.index');

Route::post('/kelas/simpan', [KelasController::class, 'simpan'])->name('kelas.simpan');

Route::get('/kelas/edit/{id}', [KelasController::class, 'edit'])->name('kelas.edit');

Route::post('/kelas/update/{id}', [KelasController::class, 'update'])->name('kelas.update');

Route::get('/kelas/hapus/{id}', [KelasController::class, 'hapus'])->name('kelas.hapus');

// Lihat siswa berdasarkan kelas
Route::get('/kelas/{id}/siswa', [KelasController::class, 'lihatSiswa'])->name('kelas.siswa');

// Print kelas
Route::get('/kelas/print/{id}', [KelasController::class, 'print'])->name('kelas.print');



//EKA DAN ICHA (GURU)
Route::view('/penghargaan', 'template.penghargaan')->middleware('auth')->name('penghargaan');
Route::view('/sanksi', 'template.sanksi')->middleware('auth')->name('sanksi');



// ============================================
// BACKEND PELANGGARAN
// ============================================

// FORM Input Pelanggaran
Route::get('/input-pelanggaran', [PelanggaranController::class, 'create'])
    ->name('input.pelanggaran')
    ->middleware('auth');

// Simpan Pelanggaran
Route::post('/input-pelanggaran/store', [PelanggaranController::class, 'store'])
    ->name('pelanggaran.store')
    ->middleware('auth');

// History Pelanggaran
Route::get('/history/pelanggaran', [PelanggaranController::class, 'index'])
    ->name('history.pelanggaran')
    ->middleware('auth');


// MINI SIDEBAR — History Penghargaan
Route::get('/history/penghargaan', function () {
    return view('history_penghargaan');
})->name('history.penghargaan')->middleware('auth');


Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
