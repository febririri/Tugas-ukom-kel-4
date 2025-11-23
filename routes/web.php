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
| HALAMAN UTAMA & LOGIN
|--------------------------------------------------------------------------
*/
Route::get('/', fn() => view('index'));
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

/*
|--------------------------------------------------------------------------
| DASHBOARD & DASHBOARD GURU DETAIL PELANGGARAN
|--------------------------------------------------------------------------
*/
Route::get('/dashboard-admin', fn() => view('template.dashboard_admin'))->middleware('auth')->name('dashboard.admin');

// Dashboard Guru (utama)
Route::get('/dashboard-guru', [SiswaController::class, 'dashboardGuru'])->middleware('auth')->name('dashboard.guru');

// Route untuk tombol "Lihat Pelanggaran" per siswa di dashboard guru
Route::get('/dashboard-guru/pelanggaran/{siswa_id}', [PelanggaranController::class, 'historySiswa'])
    ->middleware('auth')->name('dashboard.guru.pelanggaran');

Route::get('/penghargaan', fn() => view('template.penghargaan'))->name('penghargaan');

/*
|--------------------------------------------------------------------------
| KATEGORI PELANGGARAN
|--------------------------------------------------------------------------
*/
Route::get('/kategori_pelanggaran', [KategoriController::class, 'index'])->name('kategori.pelanggaran');
Route::post('/kategori/tambah', [KategoriController::class, 'store'])->name('kategori.simpan');
Route::get('/hapus_kategori/{id}', [KategoriController::class, 'destroy'])->name('kategori.hapus');
Route::get('/kategori/edit/{id}', [KategoriController::class, 'edit'])->name('kategori.edit');
Route::post('/kategori/update/{id}', [KategoriController::class, 'update'])->name('kategori.update');

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
Route::get('/sanksi_pelanggaran', [SanksiPelanggaranController::class, 'index'])->name('sanksi.pelanggaran');
Route::get('/sanksi/tambah', [SanksiPelanggaranController::class, 'create'])->name('sanksi.tambah');
Route::post('/sanksi/simpan', [SanksiPelanggaranController::class, 'store'])->name('sanksi.simpan');
Route::get('/sanksi/edit/{id}', [SanksiPelanggaranController::class, 'edit'])->name('sanksi.edit');
Route::post('/sanksi/update/{id}', [SanksiPelanggaranController::class, 'update'])->name('sanksi.update');
Route::get('/sanksi/hapus/{id}', [SanksiPelanggaranController::class, 'destroy'])->name('sanksi.hapus');

/*
|--------------------------------------------------------------------------
| DATA SISWA & KELAS
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
| DATA GURU
|--------------------------------------------------------------------------
*/
Route::get('/guru', function () {
    $path = public_path('guru.json');
    $guru = file_exists($path) ? json_decode(file_get_contents($path), true) : [];
    return view('template.guru', compact('guru'));
})->name('guru');
Route::get('/tambah_guru', fn() => view('template.tambah_guru'));
Route::post('/guru/simpan', function () {
    $path = public_path('guru.json');
    $existing = file_exists($path) ? json_decode(file_get_contents($path), true) : [];
    $data = ['nama' => request('nama'), 'nip' => request('nip')];
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
Route::get('/kelas/{id}/siswa', [KelasController::class, 'lihatSiswa'])->name('kelas.siswa');
Route::get('/kelas/print/{id}', [KelasController::class, 'print'])->name('kelas.print');

/*
|--------------------------------------------------------------------------
| BACKEND PELANGGARAN CRUD (PAKAI RESOURCE)
|--------------------------------------------------------------------------
*/
Route::resource('pelanggaran', PelanggaranController::class)->middleware('auth');
Route::get('/input-pelanggaran', [PelanggaranController::class, 'create'])->name('input.pelanggaran')->middleware('auth');
Route::get('/history/pelanggaran', [PelanggaranController::class, 'index'])->name('history.pelanggaran')->middleware('auth');

// ROUTE CETAK PELANGGARAN PDF
Route::get('/pelanggaran/cetak', [PelanggaranController::class, 'cetakPDF'])->name('pelanggaran.cetak')->middleware('auth');

/*
|--------------------------------------------------------------------------
| HISTORY & LOGOUT
|--------------------------------------------------------------------------
*/
Route::get('/history/penghargaan', fn() => view('history_penghargaan'))->name('history.penghargaan')->middleware('auth');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
