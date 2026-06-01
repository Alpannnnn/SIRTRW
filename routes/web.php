<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KependudukanController;
use App\Http\Controllers\VerifikasiController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\AduanController;
use App\Http\Controllers\KasController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengumumanController;

use App\Http\Controllers\PublicController;
use App\Http\Controllers\AdminController;

// Public Landing Page (tanpa login)
Route::get('/', [PublicController::class, 'landing'])->name('home');

// ── Guest Routes ──
Route::middleware('guest')->group(function () {
    Route::get('/login',    [LoginController::class, 'showForm'])->name('login');
    Route::post('/login',   [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'showForm'])->name('register');
    Route::post('/register',[RegisterController::class, 'register']);
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// ── Pending Verification ──
Route::middleware('auth')->group(function () {
    Route::get('/pending-verification', [RegisterController::class, 'showPending'])->name('pending.verification');
});

// ── Authenticated & Active Routes ──
Route::middleware(['auth', 'active'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Admin Dashboard (Pengurus RT/RW)
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard')->middleware('role:pengurus_rt,pengurus_rw');

    // Pengumuman
    Route::get('/pengumuman', [PengumumanController::class, 'index'])->name('pengumuman.index');
    Route::middleware('role:pengurus_rt,pengurus_rw')->group(function () {
        Route::get('/pengumuman/buat',    [PengumumanController::class, 'create'])->name('pengumuman.create');
        Route::post('/pengumuman',        [PengumumanController::class, 'store'])->name('pengumuman.store');
        Route::delete('/pengumuman/{pengumuman}', [PengumumanController::class, 'destroy'])->name('pengumuman.destroy');
    });

    // Surat
    Route::get('/surat',                [SuratController::class, 'index'])->name('surat.index');
    Route::get('/surat/ajukan',         [SuratController::class, 'create'])->name('surat.create');
    Route::post('/surat',               [SuratController::class, 'store'])->name('surat.store');
    Route::get('/surat/{surat}',        [SuratController::class, 'show'])->name('surat.show');
    Route::middleware('role:pengurus_rt,pengurus_rw')->group(function () {
        Route::post('/surat/{surat}/approve-rt', [SuratController::class, 'approveRt'])->name('surat.approve-rt');
        Route::post('/surat/{surat}/approve-rw', [SuratController::class, 'approveRw'])->name('surat.approve-rw');
        Route::post('/surat/{surat}/reject',     [SuratController::class, 'reject'])->name('surat.reject');
    });

    // Aduan
    Route::get('/aduan',                [AduanController::class, 'index'])->name('aduan.index');
    Route::get('/aduan/buat',           [AduanController::class, 'create'])->name('aduan.create');
    Route::post('/aduan',               [AduanController::class, 'store'])->name('aduan.store');
    Route::get('/aduan/{aduan}',        [AduanController::class, 'show'])->name('aduan.show');
    Route::post('/aduan/{aduan}/komentar', [AduanController::class, 'storeKomentar'])->name('aduan.komentar');
    Route::middleware('role:pengurus_rt,pengurus_rw')->group(function () {
        Route::patch('/aduan/{aduan}/status', [AduanController::class, 'updateStatus'])->name('aduan.status');
    });

    // Kas
    Route::get('/kas',              [KasController::class, 'dashboard'])->name('kas.dashboard');
    Route::get('/kas/transaksi',    [KasController::class, 'index'])->name('kas.index');
    Route::middleware('role:pengurus_rt,pengurus_rw')->group(function () {
        Route::get('/kas/catat',        [KasController::class, 'create'])->name('kas.create');
        Route::post('/kas',             [KasController::class, 'store'])->name('kas.store');
        Route::delete('/kas/{kas}',     [KasController::class, 'destroy'])->name('kas.destroy');
    });

    // Event
    Route::get('/event',                [EventController::class, 'index'])->name('event.index');
    Route::middleware('role:pengurus_rt,pengurus_rw')->group(function () {
        Route::get('/event/buat',       [EventController::class, 'create'])->name('event.create');
        Route::post('/event',           [EventController::class, 'store'])->name('event.store');
        Route::get('/event/{event}/edit',[EventController::class, 'edit'])->name('event.edit');
        Route::put('/event/{event}',    [EventController::class, 'update'])->name('event.update');
        Route::delete('/event/{event}', [EventController::class, 'destroy'])->name('event.destroy');
    });

    // Inventaris
    Route::get('/inventaris',           [InventarisController::class, 'katalog'])->name('inventaris.katalog');
    Route::get('/inventaris/{barang}',  [InventarisController::class, 'show'])->name('inventaris.show');
    Route::middleware('role:pengurus_rt,pengurus_rw')->group(function () {
        Route::get('/inventaris/tambah/baru', [InventarisController::class, 'create'])->name('inventaris.create');
        Route::post('/inventaris',            [InventarisController::class, 'store'])->name('inventaris.store');
        Route::get('/inventaris/{barang}/edit', [InventarisController::class, 'edit'])->name('inventaris.edit');
        Route::put('/inventaris/{barang}',    [InventarisController::class, 'update'])->name('inventaris.update');
    });

    // Peminjaman
    Route::get('/peminjaman',               [PeminjamanController::class, 'index'])->name('peminjaman.index');
    Route::get('/peminjaman/ajukan',        [PeminjamanController::class, 'create'])->name('peminjaman.create');
    Route::post('/peminjaman',              [PeminjamanController::class, 'store'])->name('peminjaman.store');
    Route::middleware('role:pengurus_rt,pengurus_rw')->group(function () {
        Route::post('/peminjaman/{peminjaman}/approve', [PeminjamanController::class, 'approve'])->name('peminjaman.approve');
        Route::post('/peminjaman/{peminjaman}/reject',  [PeminjamanController::class, 'reject'])->name('peminjaman.reject');
        Route::post('/peminjaman/{peminjaman}/return',  [PeminjamanController::class, 'returnItem'])->name('peminjaman.return');
    });

    // Pengurus Only
    Route::middleware('role:pengurus_rt,pengurus_rw')->group(function () {
        Route::get('/verifikasi',                       [VerifikasiController::class, 'index'])->name('verifikasi.index');
        Route::post('/verifikasi/{warga}/approve',      [VerifikasiController::class, 'approve'])->name('verifikasi.approve');
        Route::post('/verifikasi/{warga}/suspend',      [VerifikasiController::class, 'suspend'])->name('verifikasi.suspend');
        Route::post('/verifikasi/{warga}/restore',      [VerifikasiController::class, 'restore'])->name('verifikasi.restore');

        Route::get('/kependudukan',                     [KependudukanController::class, 'index'])->name('kependudukan.index');
        Route::get('/kependudukan/{warga}',             [KependudukanController::class, 'show'])->name('kependudukan.show');
    });
});
