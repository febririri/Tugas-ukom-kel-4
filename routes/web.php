<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PelanggaranController;

// Halaman utama
Route::get('/', function () {
    return view('index');
});

// Login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

// Dashboard
Route::get('/dashboard-admin', function () {
    return view('template.dashboard_admin');
})->middleware('auth')->name('dashboard.admin');

Route::get('/dashboard-guru', function () {
    return view('template.dashboard_guru');
})->middleware('auth')->name('dashboard.guru');

// Halaman tambahan
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

// Logout
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
