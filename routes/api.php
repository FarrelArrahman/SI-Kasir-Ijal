<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\st_CabangAPIController;
use App\Http\Controllers\API\st_TransaksiAPIController;
use App\Http\Controllers\API\st_LaporanKeuanganAPIController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function() {
	// Transaksi Pembelian
	Route::get('/transaksi/id', [st_TransaksiAPIController::class, 'getIdTransaksi'])->name('id_transaksi');
	Route::get('/transaksi/id/{tanggal}', [st_TransaksiAPIController::class, 'getIdTransaksiByTanggal'])->name('id_transaksi_by_tanggal');
	Route::get('/transaksi/{transaksi}', [st_TransaksiAPIController::class, 'getBarangTransaksi'])->name('get_barang_transaksi');
	Route::post('/transaksi/{transaksi}', [st_TransaksiAPIController::class, 'addBarangTransaksi'])->name('add_barang_transaksi');
	Route::get('/pembeli/{transaksi}', [st_TransaksiAPIController::class, 'getDataPembeli'])->name('get_data_pembeli');
	Route::post('/pembeli/{transaksi}', [st_TransaksiAPIController::class, 'saveDataPembeli'])->name('save_data_pembeli');
	Route::put('/transaksi/{transaksi}', [st_TransaksiAPIController::class, 'editBarangTransaksi'])->name('edit_barang_transaksi');
	Route::get('/harga/{transaksi}', [st_TransaksiAPIController::class, 'getHargaTransaksi'])->name('get_harga_transaksi');
	Route::delete('/transaksi/{transaksi}', [st_TransaksiAPIController::class, 'deleteBarangTransaksi'])->name('delete_barang_transaksi');
	Route::put('/transaksi/save/{transaksi}', [st_TransaksiAPIController::class, 'simpanTransaksi'])->name('simpan_transaksi');
	Route::delete('/transaksi/delete/{transaksi}', [st_TransaksiAPIController::class, 'deleteTransaksi'])->name('delete_transaksi');

	// Laporan Keuangan
	Route::get('/transaksi-laporan-keuangan', [st_LaporanKeuanganAPIController::class, 'transaksiLaporanKeuangan'])->name('transaksi_laporan_keuangan');
	Route::get('/laporan-keuangan', [st_LaporanKeuanganAPIController::class, 'laporanKeuangan'])->name('laporan_keuangan');

	// Cabang
	Route::get('/cabang', [st_CabangAPIController::class, 'getListCabang'])->name('get_list_cabang');
});