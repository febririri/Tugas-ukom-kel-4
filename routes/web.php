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

// 🔹 Logout
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
