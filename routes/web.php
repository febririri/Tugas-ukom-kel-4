<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('index');
});

// Halaman login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');

// Proses login
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

// Halaman dashboard (setelah login)
Route::get('/dashboard', [AuthController::class, 'dashboard'])
    ->middleware('auth')
    ->name('dashboard');

// Logout
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

Route::get('/', function () {return view('index');});
Route::get('/dashboard-guru', function () {return view('dashboard_guru');})->name('dashboard.guru');
Route::get('/input-pelanggaran', function () {return view('input pelanggaran');})->name('input.pelanggaran');
Route::get('/penghargaan', function () {
    return view('penghargaan');
})->name('input.penghargaan');
