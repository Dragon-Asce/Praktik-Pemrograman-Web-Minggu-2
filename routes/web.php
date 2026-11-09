<?php

use Illuminate\Support\Facades\Route;

// Bab 1 — halaman welcome akademik
Route::get('/', function () {
    return view('welcome-akademik');
});

// 2.3 Route dasar
Route::get('/akademik', function () {
    return "Halaman Utama Akademik";
});

// 2.4 Route parameter
Route::get('/mahasiswa/{nama}', function ($nama) {
    return "Nama Mahasiswa: " . $nama;
});

// 2.5 Route group
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return "Dashboard Admin";
    });
});

// 2.6 Route resource — lihat catatan di bawah
Route::get('/mahasiswa', function () {
    return view('halaman.mahasiswa');
});

Route::get('/dosen', function () {
    return view('halaman.dosen');
});

Route::get('/matakuliah', function () {
    return view('halaman.matakuliah');
});

Route::get('/kelas', function () {
    return view('halaman.kelas');
});
