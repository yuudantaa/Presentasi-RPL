<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Semua rute di bawah grup middleware `auth` hanya dapat diakses jika pengguna sudah login.
|
*/

// Rute untuk login dan register
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');

// Grup middleware auth
Route::middleware(['auth'])->group(function () {
    // Home
    Route::get('/', [PageController::class, 'home'])->name('home');
    Route::get('/home', [PageController::class, 'home']);

    // Routes for Karyawan
    Route::get('/daftarKaryawan', [PageController::class, 'daftarKaryawan']);
    Route::get('/karyawan', [PageController::class, 'daftarKaryawan'])->name('karyawan.index');
    Route::get('/karyawan/create', [PageController::class, 'createKaryawan'])->name('karyawan.create');
    Route::post('/karyawan', [PageController::class, 'storeKaryawan'])->name('karyawan.store');
    Route::get('/karyawan/{karyawan}/edit', [PageController::class, 'editKaryawan'])->name('karyawan.edit');
    Route::put('karyawan/{karyawan}', [PageController::class, 'updateKaryawan'])->name('karyawan.update');
    Route::delete('/karyawan/{karyawan}', [PageController::class, 'destroyKaryawan'])->name('karyawan.destroy');

    // Routes for Perusahaan
    Route::get('/daftarPerusahaan', [PageController::class, 'daftarPerusahaan'])->name('perusahaan.index');
    Route::get('/perusahaan/create', [PageController::class, 'createPerusahaan'])->name('perusahaan.create');
    Route::post('/perusahaan', [PageController::class, 'storePerusahaan'])->name('perusahaan.store');
    Route::get('/perusahaan/{perusahaan}/edit', [PageController::class, 'editPerusahaan'])->name('perusahaan.edit');
    Route::put('/perusahaan/{perusahaan}', [PageController::class, 'updatePerusahaan'])->name('perusahaan.update');
    Route::delete('/perusahaan/{perusahaan}', [PageController::class, 'destroyPerusahaan'])->name('perusahaan.destroy');

    // Routes for Sumber Dana
    Route::get('/daftarSumberDana', [PageController::class, 'index'])->name('sumberDana.index');
    Route::post('/sumberDana/prosesPembayaran', [PageController::class, 'prosesPembayaran'])->name('sumberDana.prosesPembayaran');
    Route::get('/daftarSumberDana/karyawan/{perusahaanId}', [PageController::class, 'getKaryawanByPerusahaan']);

    // Set Jadwal
    Route::get('/setJadwal', [PageController::class, 'setJadwal'])->name('jadwal.index');
    Route::post('/setJadwal/store', [PageController::class, 'storeJadwal'])->name('jadwal.store');
});
