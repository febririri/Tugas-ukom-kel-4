<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenghargaanController;
use App\Http\Controllers\SanksiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider and all of them
| will be assigned to the "web" middleware group. Make something great!
|
*/

// ==============================
// HALAMAN UTAMA
// ==============================
Route::get('/', function () {
    return view('welcome'); // resources/views/welcome.blade.php
})->name('home');

// ==============================
// DASHBOARD GURU
// ==============================
Route::get('/dashboard-guru', function () {
    return view('dashboard-guru'); // resources/views/dashboard-guru.blade.php
})->name('dashboard.guru');

// ==============================
// FORM PENGHARGAAN
// ==============================
Route::get('/penghargaan', [PenghargaanController::class, 'index'])
    ->name('penghargaan');

Route::post('/penghargaan/store', [PenghargaanController::class, 'store'])
    ->name('penghargaan.store');

// ==============================
// FORM SANKSI
// ==============================
Route::get('/sanksi', [SanksiController::class, 'index'])
    ->name('sanksi');

Route::post('/sanksi/store', [SanksiController::class, 'store'])
    ->name('sanksi.store');

// ==============================
// FORM INPUT PELANGGARAN (JIKA ADA)
// ==============================
Route::get('/input-pelanggaran', function () {
    return view('input_pelanggaran'); // resources/views/input_pelanggaran.blade.php
})->name('input.pelanggaran');
