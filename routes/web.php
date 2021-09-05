<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\st_TransaksiController;
use App\Http\Controllers\st_LaporanKeuanganController;

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

Route::get('/', [st_TransaksiController::class, 'index'])->name('transaksi_pembelian');
Route::get('/transaksi/{transaksi}', [st_TransaksiController::class, 'edit'])->name('edit_transaksi_pembelian');
Route::get('/laporan-keuangan', [st_LaporanKeuanganController::class, 'index'])->name('index_laporan_keuangan');
