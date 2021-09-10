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

	// Transaksi pengeluaran
	Route::get('/pengeluaran/id', [st_TransaksiPengeluaranAPIController::class, 'getIdTransaksi'])->name('id_transaksi_pengeluaran');
	Route::get('/pengeluaran/id/{tanggal}', [st_TransaksiPengeluaranAPIController::class, 'getIdTransaksiByTanggal'])->name('id_transaksi_by_tanggal_pengeluaran');
	Route::get('/pengeluaran/{transaksi}', [st_TransaksiPengeluaranAPIController::class, 'getBarangTransaksi'])->name('get_barang_transaksi_pengeluaran');
	Route::post('/pengeluaran/{transaksi}', [st_TransaksiPengeluaranAPIController::class, 'addBarangTransaksi'])->name('add_barang_transaksi_pengeluaran');
	Route::get('/pengeluaran_pembeli/{transaksi}', [st_TransaksiPengeluaranAPIController::class, 'getDataPembeli'])->name('get_data_pembeli_pengeluaran');
	Route::post('/pengeluaran_pembeli/{transaksi}', [st_TransaksiPengeluaranAPIController::class, 'saveDataPembeli'])->name('save_data_pembeli_pengeluaran');
	Route::put('/pengeluaran/{transaksi}', [st_TransaksiPengeluaranAPIController::class, 'editBarangTransaksi'])->name('edit_barang_transaksi_pengeluaran');
	Route::get('/pengeluaran_harga/{transaksi}', [st_TransaksiPengeluaranAPIController::class, 'getHargaTransaksi'])->name('get_harga_transaksi_pengeluaran');
	Route::delete('/pengeluaran/{transaksi}', [st_TransaksiPengeluaranAPIController::class, 'deleteBarangTransaksi'])->name('delete_barang_transaksi_pengeluaran');
	Route::put('/pengeluaran/save/{transaksi}', [st_TransaksiPengeluaranAPIController::class, 'simpanTransaksi'])->name('simpan_transaksi_pengeluaran');
	Route::delete('/pengeluaran/delete/{transaksi}', [st_TransaksiPengeluaranAPIController::class, 'deleteTransaksi'])->name('delete_transaksi_pengeluaran');
	
	// Laporan Keuangan
	Route::get('/transaksi-laporan-keuangan-pengeluaran', [st_LaporanKeuanganAPIController::class, 'transaksiLaporanKeuanganPengeluaran'])->name('transaksi_laporan_keuangan_Pengeluaran');
	Route::get('/laporan-keuangan-pengeluaran', [st_LaporanKeuanganAPIController::class, 'laporanKeuanganPengeluaran'])->name('laporan_keuangan_Pengeluaran');
});