<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\st_TransaksiController;
use App\Http\Controllers\StTransaksiPengeluaranController;
use App\Http\Controllers\st_LaporanKeuanganController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\ProdukCustomController;

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

Route::get('/transaksi_pembelian', [st_TransaksiController::class, 'index'])->name('transaksi_pembelian');
Route::get('/transaksi_pengeluaran', [StTransaksiPengeluaranController::class, 'index'])->name('transaksi_pengeluaran');
Route::get('/transaksi/{transaksi}', [st_TransaksiController::class, 'edit'])->name('edit_transaksi_pembelian');
Route::get('/laporan_keuangan', [st_LaporanKeuanganController::class, 'index'])->name('index_laporan_keuangan');
Route::get('/pengeluaran-stainless', [st_LaporanKeuanganController::class, 'pengeluaran'])->name('pengeluaran_stainless');
Route::get('/pemasukan-stainless-musi', [st_LaporanKeuanganController::class, 'pemasukan_musi'])->name('pemasukan-stainless-musi');

// Type
Route::get('/type', [TypeController::class, 'index'])->name('type.index');
Route::get('/type/create', [TypeController::class, 'create'])->name('type.create');
Route::post('/type', [TypeController::class, 'store'])->name('type.store');
Route::get('/type/{type}', [TypeController::class, 'edit'])->name('type.edit');
Route::put('/type/{type}', [TypeController::class, 'update'])->name('type.update');
Route::delete('/type/{type}', [TypeController::class, 'destroy'])->name('type.destroy');

// Stok
Route::get('/stok', [StokController::class, 'index'])->name('stok.index');
Route::get('/stok/list', [StokController::class, 'list'])->name('stok.list');
Route::get('/stok/create', [StokController::class, 'create'])->name('stok.create');
Route::post('/stok', [StokController::class, 'store'])->name('stok.store');
Route::post('/stok/{id}/upload', [StokController::class, 'upload'])->name('stok.upload');
Route::get('/stok/{id}/edit', [StokController::class, 'edit'])->name('stok.edit');
Route::get('/stok/{id}/foto', [StokController::class, 'foto'])->name('stok.foto');
Route::put('/stok/{id}/fotoUtama', [StokController::class, 'fotoUtama'])->name('stok.fotoUtama');
Route::delete('/stok/{id}/foto', [StokController::class, 'deleteFoto'])->name('stok.deleteFoto');
Route::put('/stok/{id}/update', [StokController::class, 'update'])->name('stok.update');
Route::delete('/stok/{id}', [StokController::class, 'destroy'])->name('stok.destroy');

// Produk Custom
Route::get('/produk_custom', [ProdukCustomController::class, 'index'])->name('produk_custom.index');
Route::get('/produk_custom/list', [ProdukCustomController::class, 'list'])->name('produk_custom.list');
Route::get('/produk_custom/create', [ProdukCustomController::class, 'create'])->name('produk_custom.create');
Route::post('/produk_custom', [ProdukCustomController::class, 'store'])->name('produk_custom.store');
Route::post('/produk_custom/{id}/upload', [ProdukCustomController::class, 'upload'])->name('produk_custom.upload');
Route::get('/produk_custom/{id}/edit', [ProdukCustomController::class, 'edit'])->name('produk_custom.edit');
Route::get('/produk_custom/{id}/foto', [ProdukCustomController::class, 'foto'])->name('produk_custom.foto');
Route::put('/produk_custom/{id}/fotoUtama', [ProdukCustomController::class, 'fotoUtama'])->name('produk_custom.fotoUtama');
Route::delete('/produk_custom/{id}/foto', [ProdukCustomController::class, 'deleteFoto'])->name('produk_custom.deleteFoto');
Route::put('/produk_custom/{id}/update', [ProdukCustomController::class, 'update'])->name('produk_custom.update');
Route::delete('/produk_custom/{id}', [ProdukCustomController::class, 'destroy'])->name('produk_custom.destroy');

Route::get('/','App\Http\Controllers\DasboardController@index')->name('home');
