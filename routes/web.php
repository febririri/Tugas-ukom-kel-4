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
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardGuruController;


/*
|--------------------------------------------------------------------------
| HALAMAN UTAMA
|--------------------------------------------------------------------------
*/

Route::get('/', fn() => view('index'));


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
Route::middleware(['auth'])->group(function () {

    // ADMIN DASHBOARD
    Route::get('/admin/dashboard', [DashboardController::class, 'admin'])
        ->name('dashboard.admin')
        ->middleware('role:admin');

    // GURU DASHBOARD
    Route::get('/guru/dashboard', [DashboardGuruController::class, 'index'])
        ->name('dashboard.guru')
        ->middleware('role:guru');
});


/*
|--------------------------------------------------------------------------
| GURU CRUD (ADMIN)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth','role:admin'])->prefix('admin')->group(function () {

    Route::get('/guru', [GuruController::class, 'index'])->name('guru.index');
    Route::get('/guru/create', [GuruController::class, 'create'])->name('guru.create');
    Route::post('/guru/store', [GuruController::class, 'store'])->name('guru.store');
    Route::get('/guru/{id}/edit', [GuruController::class, 'edit'])->name('guru.edit');
    Route::post('/guru/{id}/update', [GuruController::class, 'update'])->name('guru.update');
    Route::delete('/guru/{id}', [GuruController::class, 'destroy'])->name('guru.destroy');
});


/*
|--------------------------------------------------------------------------
| KATEGORI PELANGGARAN
|--------------------------------------------------------------------------
*/

// LIST KATEGORI
Route::get('/kategori_pelanggaran', [KategoriController::class, 'index'])
    ->name('kategori.pelanggaran');

// TAMBAH DATA
Route::post('/kategori/tambah', [KategoriController::class, 'store'])
    ->name('kategori.simpan');

// HAPUS
Route::get('/hapus_kategori/{id}', [KategoriController::class, 'destroy'])
    ->name('kategori.hapus');

// EDIT FORM
Route::get('/kategori/edit/{id}', [KategoriController::class, 'edit'])
    ->name('kategori.edit');

// UPDATE
Route::post('/kategori/update/{id}', [KategoriController::class, 'update'])
    ->name('kategori.update');


/*
|--------------------------------------------------------------------------
| BENTUK PELANGGARAN
|--------------------------------------------------------------------------
*/

Route::get('/bentuk/{id}', [BentukController::class, 'index'])->name('bentuk.index');
Route::get('/bentuk/tambah/{id}', [BentukController::class, 'create'])->name('bentuk.create');
Route::post('/bentuk/store', [BentukController::class, 'store'])->name('bentuk.store');
Route::get('/bentuk/edit/{id}', [BentukController::class, 'edit'])->name('bentuk.edit');
Route::post('/bentuk/update/{id}', [BentukController::class, 'update'])->name('bentuk.update');
Route::get('/bentuk/hapus/{id}', [BentukController::class, 'destroy'])->name('bentuk.delete');


/*
|--------------------------------------------------------------------------
| SANKSI PELANGGARAN
|--------------------------------------------------------------------------
*/

Route::get('/sanksi', [SanksiPelanggaranController::class, 'viewSanksi'])->name('sanksi');

Route::get('/sanksi_pelanggaran', [SanksiPelanggaranController::class, 'index'])
    ->name('sanksi.pelanggaran');

Route::get('/sanksi/tambah', [SanksiPelanggaranController::class, 'create'])
    ->name('sanksi.tambah');

Route::post('/sanksi/simpan', [SanksiPelanggaranController::class, 'store'])
    ->name('sanksi.simpan');

Route::get('/sanksi/edit/{id}', [SanksiPelanggaranController::class, 'edit'])
    ->name('sanksi.edit');

Route::post('/sanksi/update/{id}', [SanksiPelanggaranController::class, 'update'])
    ->name('sanksi.update');

Route::get('/sanksi/hapus/{id}', [SanksiPelanggaranController::class, 'destroy'])
    ->name('sanksi.hapus');


/*
|--------------------------------------------------------------------------
| DATA SISWA
|--------------------------------------------------------------------------
*/

Route::get('/kelas/{id}/siswa/create', [SiswaController::class, 'create'])->name('siswa.create');
Route::post('/kelas/{id}/siswa/simpan', [SiswaController::class, 'store'])->name('kelas.siswa.simpan');
Route::get('/kelas/{id}/siswa', [KelasController::class, 'lihatSiswa'])->name('kelas.siswa');
Route::get('/siswa/edit/{id}', [SiswaController::class, 'edit'])->name('siswa.edit');
Route::post('/siswa/update/{id}', [SiswaController::class, 'update'])->name('siswa.update');
Route::get('/siswa/hapus/{id}', [SiswaController::class, 'destroy'])->name('siswa.hapus');
Route::get('/siswa/detail/{id}', [SiswaController::class, 'show'])->name('siswa.show');


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
Route::get('/kelas/{id}/siswa', [KelasController::class, 'lihatSiswa'])->name('kelas.siswa');
Route::get('/kelas/print/{id}', [KelasController::class, 'print'])->name('kelas.print');


/*
|--------------------------------------------------------------------------
| EKA & ICHA (TIDAK DIUBAH)
|--------------------------------------------------------------------------
*/

Route::view('/penghargaan', 'template.penghargaan')->middleware('auth')->name('penghargaan');
Route::view('/sanksi', 'template.sanksi')->middleware('auth')->name('sanksi');


/*
|--------------------------------------------------------------------------
| BACKEND PELANGGARAN
|--------------------------------------------------------------------------
*/

Route::get('/input-pelanggaran', [PelanggaranController::class, 'create'])
    ->name('input.pelanggaran')
    ->middleware('auth');

Route::post('/input-pelanggaran/store', [PelanggaranController::class, 'store'])
    ->name('pelanggaran.store')
    ->middleware('auth');

Route::get('/history/pelanggaran', [PelanggaranController::class, 'index'])
    ->name('history.pelanggaran')
    ->middleware('auth');

Route::get('/history/penghargaan', fn() => view('history_penghargaan'))
    ->name('history.penghargaan')
    ->middleware('auth');


/*
|--------------------------------------------------------------------------
| LOGOUT
|--------------------------------------------------------------------------
*/

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
