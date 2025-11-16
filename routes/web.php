<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;

// 🔹 Halaman utama
Route::get('/', function () {
    return view('index');
});

// 🔹 Login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

// 🔹 Dashboard berdasarkan role
Route::get('/dashboard-admin', function () {
    return view('template.dashboard_admin');
})->middleware('auth')->name('dashboard.admin');

Route::get('/dashboard-guru', function () {
    return view('template.dashboard_guru');
})->middleware('auth')->name('dashboard.guru');

// 🔹 Halaman tambahan (pastikan pakai 'template.' di depan)
Route::view('/input-pelanggaran', 'template.input pelanggaran')->name('input.pelanggaran');
Route::view('/penghargaan', 'template.penghargaan')->name('penghargaan');
Route::view('/sanksi', 'template.sanksi')->name('sanksi');

// 🔹 Halaman history (utama)
Route::get('/history', function () {
    return view('history');
})->name('history');

// 🔹 MINI SIDEBAR — History Pelanggaran & Penghargaan
Route::get('/history/pelanggaran', function () {
    return view('history_pelanggaran');   // pastikan file: resources/views/history_pelanggaran.blade.php
})->name('history.pelanggaran');

Route::get('/history/penghargaan', function () {
    return view('history_penghargaan');  // pastikan file: resources/views/history_penghargaan.blade.php
})->name('history.penghargaan');

// 🔹 Logout
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

