<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {return view('index');});
Route::get('/dashboard-guru', function () {return view('dashboard_guru');})->name('dashboard.guru');
Route::get('/input-pelanggaran', function () {return view('input pelanggaran');})->name('input.pelanggaran');
Route::get('/penghargaan', function () {
    return view('penghargaan');
})->name('input.penghargaan');