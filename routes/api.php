<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\TransaksiAPIController;

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
	Route::get('/transaksi/id', [TransaksiAPIController::class, 'getIdTransaksi'])->name('id_transaksi');
	Route::get('/transaksi/{transaksi}', [TransaksiAPIController::class, 'getBarangTransaksi'])->name('get_barang_transaksi');
	Route::post('/transaksi/{transaksi}', [TransaksiAPIController::class, 'addBarangTransaksi'])->name('add_barang_transaksi');
	Route::put('/transaksi/{transaksi}', [TransaksiAPIController::class, 'editBarangTransaksi'])->name('edit_barang_transaksi');
	Route::get('/harga/{transaksi}', [TransaksiAPIController::class, 'getHargaTransaksi'])->name('get_harga_transaksi');
	Route::delete('/transaksi/{transaksi}', [TransaksiAPIController::class, 'deleteBarangTransaksi'])->name('delete_barang_transaksi');
});