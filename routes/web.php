<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PelanggaranController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BentukController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SanksiPelanggaranController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\GuruController;
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
Route::get('/hapus_kategori/{id}', [KategoriController::class, 'destroy'])
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

// tampil daftar bentuk
Route::get('/bentuk/{id}', [BentukController::class, 'index'])->name('bentuk.index');

// form tambah
Route::get('/bentuk/tambah/{id}', [BentukController::class, 'create'])->name('bentuk.create');

// simpan bentuk
Route::post('/bentuk/store', [BentukController::class, 'store'])->name('bentuk.store');

// form edit
Route::get('/bentuk/edit/{id}', [BentukController::class, 'edit'])->name('bentuk.edit');

// update bentuk
Route::post('/bentuk/update/{id}', [BentukController::class, 'update'])->name('bentuk.update');

// hapus bentuk
Route::get('/bentuk/hapus/{id}', [BentukController::class, 'destroy'])->name('bentuk.delete');



/*
|--------------------------------------------------------------------------
| SANKSI PELANGGARAN
|--------------------------------------------------------------------------
*/
/// HALAMAN LIST
Route::get('/sanksi_pelanggaran', [SanksiPelanggaranController::class, 'index'])
    ->name('sanksi.pelanggaran');

// FORM TAMBAH
Route::get('/sanksi/tambah', [SanksiPelanggaranController::class, 'create'])
    ->name('sanksi.tambah');

// SIMPAN DATA
Route::post('/sanksi/simpan', [SanksiPelanggaranController::class, 'store'])
    ->name('sanksi.simpan');

// FORM EDIT
Route::get('/sanksi/edit/{id}', [SanksiPelanggaranController::class, 'edit'])
    ->name('sanksi.edit');

// UPDATE DATA
Route::post('/sanksi/update/{id}', [SanksiPelanggaranController::class, 'update'])
    ->name('sanksi.update');

// HAPUS DATA
Route::get('/sanksi/hapus/{id}', [SanksiPelanggaranController::class, 'destroy'])
    ->name('sanksi.hapus');


/*
|--------------------------------------------------------------------------
| DATA SISWA
|--------------------------------------------------------------------------
*/




// Tambah siswa
Route::get('/kelas/{id}/siswa/create', [SiswaController::class, 'create'])
    ->name('siswa.create');

// Simpan siswa
Route::post('/kelas/{id}/siswa/simpan', [SiswaController::class, 'store'])
    ->name('kelas.siswa.simpan');

// Lihat siswa
Route::get('/kelas/{id}/siswa', [KelasController::class, 'lihatSiswa'])
    ->name('kelas.siswa');

// Edit siswa
Route::get('/siswa/edit/{id}', [SiswaController::class, 'edit'])
    ->name('siswa.edit');

// Update siswa
Route::post('/siswa/update/{id}', [SiswaController::class, 'update'])
    ->name('siswa.update');

// Hapus siswa
Route::get('/siswa/hapus/{id}', [SiswaController::class, 'destroy'])
    ->name('siswa.hapus');

Route::get('/siswa/detail/{id}', [SiswaController::class, 'show'])
    ->name('siswa.show');

/// daftar guru
Route::get('/guru', [GuruController::class, 'index'])->name('guru.index');

// create + store
Route::get('/guru/create', [GuruController::class, 'create'])->name('guru.create');
Route::post('/guru/store', [GuruController::class, 'store'])->name('guru.store');

// show
Route::get('/guru/{id}', [GuruController::class, 'show'])->name('guru.show');

// edit + update
Route::get('/guru/{id}/edit', [GuruController::class, 'edit'])->name('guru.edit');
Route::post('/guru/{id}/update', [GuruController::class, 'update'])->name('guru.update');

// hapus
Route::delete('/guru/{id}', [GuruController::class, 'destroy'])->name('guru.destroy');
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
