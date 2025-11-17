<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\PengirimanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Semua route aplikasi web kamu didefinisikan di sini.
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// ===============================
// 🔹 ADMIN ROUTES
// ===============================
Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/admin/beranda', function () {
        return view('admin.beranda');
    })->name('admin.beranda');
});

// ===============================
// 🔹 USER ROUTES
// ===============================
Route::middleware(['auth', 'role:user'])->group(function () {

    Route::get('/user/beranda', function () {
        return view('user.beranda');
    })->name('user.beranda');
});

// ===============================
// 🔹 FITUR PEMBELIAN
// ===============================
Route::resource('pembelian', PembelianController::class);

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('pembelian', App\Http\Controllers\PembelianController::class);
});

// Tambahan untuk fitur pembayaran
Route::get('/pembelian/{id}/payment', [PembelianController::class, 'paymentPage'])
    ->name('pembelian.payment');
Route::post('/pembelian/{id}/konfirmasi', [PembelianController::class, 'konfirmasi'])
    ->name('pembelian.konfirmasi');
Route::post('pembelian/{pembelian}/konfirmasi', [PembelianController::class, 'konfirmasi'])->name('pembelian.konfirmasi');
Route::post('pembelian/{pembelian}/batal', [PembelianController::class, 'batal'])->name('pembelian.batal');
Route::get('/pembelian/{id}/cetak', [PembelianController::class, 'cetak'])->name('pembelian.cetak');

Route::post('/admin/pembelian/{id}/approve', [PembelianController::class, 'approve'])
    ->name('admin.pembelian.approve');

Route::post('/admin/pembelian/{id}/reject', [PembelianController::class, 'reject'])
    ->name('admin.pembelian.reject');
// ===============================
// 🔹 FITUR BARANG & PENGIRIMAN
// ===============================
Route::resource('barang', App\Http\Controllers\BarangController::class);
Route::get('/pengiriman', [PengirimanController::class, 'index'])->name('pengiriman.index');
Route::get('/pengiriman/status/{id}', [PengirimanController::class, 'status'])->name('pengiriman.status');

// ===============================
// 🔹 DASHBOARD
// ===============================
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->middleware('auth');
