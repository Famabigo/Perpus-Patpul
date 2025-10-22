<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\KatalogController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\LaporanController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('preview');
});

Route::get('/katalog/{book}', [KatalogController::class, 'show'])->name('katalog.show');

// Halaman dashboard hanya untuk user yang sudah login, dan diarahkan sesuai role SETELAH login
Route::get('/dashboard', function () {
    if (Auth::user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    } else {
        // Siswa diarahkan ke katalog atau dashboard siswa
        return redirect()->route('katalog');
    }
})->middleware(['auth', 'verified'])->name('dashboard');

// Halaman login dan register tetap pakai route bawaan Breeze
// Tidak perlu diubah, sudah otomatis ada di routes/auth.php
// Jika ingin custom, bisa override view di resources/views/auth/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'isadmin'])->group(function () {
    Route::resource('books', BookController::class);
    Route::post('/peminjaman/{id}/approve', [PeminjamanController::class, 'approve'])->name('peminjaman.approve');
    Route::post('/peminjaman/{id}/reject', [PeminjamanController::class, 'reject'])->name('peminjaman.reject');
    Route::post('/peminjaman/{id}/reject', [PeminjamanController::class, 'reject'])->name('peminjaman.reject');
    Route::post('/peminjaman/{id}/kembali', [PeminjamanController::class, 'kembali'])->name('peminjaman.kembali');
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->middleware(['auth', 'isadmin'])->name('admin.dashboard');

    // Daftar siswa menunggu persetujuan
    Route::get('/admin/siswa-menunggu', [AdminController::class, 'siswaMenunggu'])->name('admin.siswa.menunggu');
    Route::post('/admin/siswa/{id}/setujui', [AdminController::class, 'setujuiSiswa'])->name('admin.siswa.setujui');
    Route::post('/admin/siswa/{id}/tolak', [AdminController::class, 'tolakSiswa'])->name('admin.siswa.tolak');

    // Daftar peminjaman aktif untuk admin
    Route::get('/admin/peminjaman-aktif', [PeminjamanController::class, 'aktifAdmin'])->name('admin.peminjaman.aktif');
    // Daftar peminjaman terlambat untuk admin
    Route::get('/admin/peminjaman-terlambat', [PeminjamanController::class, 'terlambatAdmin'])->name('admin.peminjaman.terlambat');
    // Daftar peminjaman aktif untuk admin
    Route::get('/admin/peminjaman-aktif', [PeminjamanController::class, 'aktifAdmin'])->name('admin.peminjaman.aktif');
    // Riwayat peminjaman untuk admin
    Route::get('/admin/riwayat-peminjaman', [PeminjamanController::class, 'riwayatAdmin'])->name('admin.riwayat.peminjaman');

    // Daftar siswa untuk admin
    Route::get('/admin/siswa', [AdminController::class, 'daftarSiswa'])
        ->middleware(['auth', 'isadmin'])
        ->name('admin.siswa');

    // Laporan
    Route::get('/admin/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('/admin/laporan/export-pdf', [LaporanController::class, 'exportPdf'])->name('laporan.export.pdf');
});

Route::get('/katalog', [KatalogController::class, 'index'])->middleware('auth')->name('katalog');

Route::middleware(['auth', 'isapproved'])->group(function () {
    Route::post('/pinjam/{book}', [PeminjamanController::class, 'store'])->name('pinjam');
    // Siswa: daftar peminjaman aktif
    Route::get('/peminjaman-siswa', [PeminjamanController::class, 'indexSiswa'])->name('siswa.peminjaman.index');
    // Siswa: riwayat peminjaman
    Route::get('/riwayat', [PeminjamanController::class, 'riwayatSiswa'])->name('riwayat');
});

// Route untuk user yang belum disetujui admin
Route::get('/not-approved', function () {
    return view('not_approved');
})->middleware('auth')->name('not.approved');

require __DIR__.'/auth.php';
