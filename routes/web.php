<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PembelianController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('beranda');
});

// Resource route untuk CRUD pembelian
Route::resource('pembelian', PembelianController::class);

// Tambahan untuk fitur pembayaran
Route::get('pembelian/{pembelian}/payment', [PembelianController::class, 'payment'])
     ->name('pembelian.payment');

Route::post('pembelian/{pembelian}/konfirmasi', [PembelianController::class, 'konfirmasi'])
     ->name('pembelian.konfirmasi');

Route::post('pembelian/{pembelian}/batal', [PembelianController::class, 'batal'])
     ->name('pembelian.batal');

Route::resource('barang', App\Http\Controllers\BarangController::class); // kadang error kalau "use" belum ada

