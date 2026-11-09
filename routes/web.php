<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;
use Illuminate\Support\Facades\Route;

// Bab 1
Route::get('/', function () {
    return view('welcome-akademik');
});

// Bab 2
// Route::get('/akademik', fn () => "Halaman Utama Akademik");
// Route::get('/mahasiswa/{nama}', fn ($nama) => "Nama Mahasiswa: " . $nama);
// Route::prefix('admin')->group(fn () => Route::get('/dashboard', fn () => "Dashboard Admin"));

// Bab 3 — route ke controller
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('mahasiswa', MahasiswaController::class);
    Route::get('/dosen', [DosenController::class, 'index'])->name('dosen.index');
    Route::get('/matakuliah', [MatakuliahController::class, 'index'])->name('matakuliah.index');
    Route::get('/kelas', function () {
        return view('kelas');
    });
});

require __DIR__.'/auth.php';
