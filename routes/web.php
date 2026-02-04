<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\PengirimanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserProfilController;  
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

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
Route::get('/profile', 'App\Http\Controllers\UserProfilController@index');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');

// Route untuk edit profil user
Route::get('/userprofil/edit/{id}', [UserProfilController::class, 'edit'])->name('userprofil.edit')->middleware('auth');

// Route untuk update profil user (gunakan PUT untuk form update)
Route::put('/userprofil/update/{id}', [UserProfilController::class, 'update'])
    ->name('userprofil.update')
    ->middleware('auth');

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

// ===============================
// 🔹 ADMIN PEMBELIAN (ALASAN PENOLAKAN)
// ===============================
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {

    // Halaman input alasan penolakan
    Route::get('/pembelian/{id}/alasan', [PembelianController::class, 'alasan'])
        ->name('pembelian.alasan');

    // Proses penolakan dengan alasan
    Route::put('/pembelian/{id}/reject', [PembelianController::class, 'reject'])
        ->name('pembelian.reject');

    // Approve pesanan
    Route::post('/pembelian/{id}/approve', [PembelianController::class, 'approve'])
        ->name('pembelian.approve');
});
    
// ===============================
// 🔹 FITUR BARANG & PENGIRIMAN
// ===============================
Route::resource('barang', App\Http\Controllers\BarangController::class);
Route::get('/pengiriman', [PengirimanController::class, 'index'])->name('pengiriman.index');
Route::get('/pengiriman/status/{id}', [PengirimanController::class, 'status'])->name('pengiriman.status');
Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'role:admin'])
    ->group(function () {
        Route::resource('barang', BarangController::class);
    });
Route::post('/pengiriman/{id}/upload/{tahap}', 
    [PengirimanController::class, 'uploadBukti']
)->name('pengiriman.uploadBukti');
Route::get('/pengiriman/cetak/{file}', 
    [PengirimanController::class, 'cetakBukti']
)->where('file', '.*')
 ->name('pengiriman.cetakBukti');
Route::put(
    '/pengiriman/{id}/selesai',
    [App\Http\Controllers\PengirimanController::class, 'selesai']
)->name('pengiriman.selesai');

// ===============================
// 🔹 DASHBOARD
// ===============================
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->middleware('auth');
