<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Backoffice\DashboardController as AdminDashboardController;
use App\Http\Controllers\Backoffice\PageController;
use App\Http\Controllers\Backoffice\KategoriController;
use App\Http\Controllers\Backoffice\PenggunaController;
use App\Http\Controllers\Backoffice\TransaksiController as AdminTransaksiController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\User\JasaController as UserJasaController;
use App\Http\Controllers\User\TransaksiController as UserTransaksiController;
use App\Http\Controllers\User\UlasanController as UserUlasanController;
use App\Http\Controllers\User\ProfilePublicController;
use App\Http\Controllers\User\SearchController;
use App\Http\Controllers\User\WalletController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'index'])->name('homepage');

Route::middleware(['auth'])->group(function () {

    // 1. Rute Khusus Admin
    Route::middleware(['role:admin'])->group(function () {
        Route::prefix('admin')->name('admin.')->group(function () {
            Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        });

        Route::prefix('backoffice')->name('backoffice.')->group(function () {
            Route::resource('pages', PageController::class);
            Route::resource('kategori', KategoriController::class)->except(['show']);

            // Pengguna
            Route::get('pengguna', [PenggunaController::class, 'index'])->name('pengguna.index');
            Route::get('pengguna/{id}', [PenggunaController::class, 'show'])->name('pengguna.show');
            Route::patch('pengguna/{id}/poin', [PenggunaController::class, 'updatePoin'])->name('pengguna.updatePoin');
            Route::patch('pengguna/{id}/reset-password', [PenggunaController::class, 'resetPassword'])->name('pengguna.resetPassword');
            Route::delete('pengguna/{id}', [PenggunaController::class, 'destroy'])->name('pengguna.destroy');

            // Transaksi Admin
            Route::get('transaksi', [AdminTransaksiController::class, 'index'])->name('transaksi.index');
            Route::get('transaksi/{id}', [AdminTransaksiController::class, 'show'])->name('transaksi.show');
            Route::patch('transaksi/{id}/status', [App\Http\Controllers\Backoffice\TransaksiController::class, 'updateStatus'])
            ->name('transaksi.updateStatus');
        });
    });

    // 2. Rute Khusus User
    Route::middleware(['role:user'])->prefix('user')->name('user.')->group(function () {
        Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');

        // Kategori
        Route::get('/kategori', [\App\Http\Controllers\User\KategoriController::class, 'index'])->name('kategori.index');

        // Search Global
        Route::get('/search', [SearchController::class, 'index'])->name('search');

        // Wallet
        Route::get('/wallet', [\App\Http\Controllers\User\WalletController::class, 'index'])->name('wallet.index');

        // Profil publik
        Route::get('/profil/{id}', [ProfilePublicController::class, 'show'])->name('profil.show');

        // Jasa
        Route::get('/jasa/browse', [UserJasaController::class, 'browse'])->name('jasa.browse');
        Route::resource('jasa', UserJasaController::class)->except(['show']);
        Route::get('/jasa/{id}', [UserJasaController::class, 'show'])->name('jasa.show');

        // Transaksi
        Route::get('/transaksi', [UserTransaksiController::class, 'index'])->name('transaksi.index');
        Route::get('/transaksi/buat', [UserTransaksiController::class, 'create'])->name('transaksi.create');
        Route::post('/transaksi', [UserTransaksiController::class, 'store'])->name('transaksi.store');
        Route::get('/transaksi/{id}', [UserTransaksiController::class, 'show'])->name('transaksi.show');
        Route::patch('/transaksi/{id}/status', [UserTransaksiController::class, 'updateStatus'])->name('transaksi.updateStatus');

        // Ulasan
        Route::get('/transaksi/{id_transaksi}/ulasan', [UserUlasanController::class, 'create'])->name('ulasan.create');
        Route::post('/transaksi/{id_transaksi}/ulasan', [UserUlasanController::class, 'store'])->name('ulasan.store');

        // Profile
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    // Profile (edit akun sendiri)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';