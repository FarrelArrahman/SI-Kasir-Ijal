<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\st_barang_pengeluaran;
use App\Models\st_Transaksi_pengeluaran;
use App\Models\st_DetailTransaksi_pengeluaran;
use App\Http\Resources\st_TransaksiPengeluaranResource;
use App\Http\Resources\st_PembeliPengeluaranResource;
use Carbon\Carbon;
use Illuminate\Http\Request;

class st_TransaksiAPIController extends Controller
{
    public function getIdTransaksi()
    {
    	$transaksi = st_Transaksi_pengeluaran::where('tanggal', today())->latest()->first();

    	if($transaksi && $transaksi->status == "Pending") {
    		$transaksi = st_Transaksi_pengeluaran::where('tanggal', today())->count();
    	} else {
    		$transaksi = st_Transaksi_pengeluaran::where('tanggal', today())->count() + 1;
    	}
        
        $data = [
        	'id_transaksi' => 'TSP' . today()->format('dmy') . sprintf('%04d', $transaksi),
        ];

        return response()->json([
        	'message' => 'ID transaksi terbaru',
        	'data' => $data
        ]);
    }

    public function getIdTransaksiByTanggal($tanggal)
    {
        $date = Carbon::parse($tanggal);
        $transaksi = st_Transaksi_pengeluaran::where('tanggal', $date)->latest()->first();

        if($transaksi && $transaksi->status == "Pending") {
            $transaksi = st_Transaksi_pengeluaran::where('tanggal', $date)->count();
        } else {
            $transaksi = st_Transaksi_pengeluaran::where('tanggal', $date)->count() + 1;
        }
        
        $data = [
            'id_transaksi' => 'TSP' . $date->format('dmy') . sprintf('%04d', $transaksi),
        ];

        return response()->json([
            'message' => 'ID transaksi terbaru pada tanggal ' . $tanggal,
            'data' => $data
        ]);
    }

    public function getBarangTransaksi($transaksi)
    {
    	$data = [
        	'transaksi' => NULL,
        ];

    	$transaksi = st_Transaksi_pengeluaran::find($transaksi);
        
        if($transaksi) {
        	$data['transaksi'] = new st_TransaksiPengeluaranResource($transaksi);
        }

        return response()->json([
        	'message' => 'Daftar barang transaksi',
        	'data' => $data
        ]);
    }

    public function addBarangTransaksi(Request $request, $transaksi)
    {
    	// return response()->json(['data' => $request->all()]);

    	$barang = st_barang_pengeluaran::create([
    		'nama_barang' => $request->nama_barang,
    		'harga_satuan' => str_replace(".", "", $request->harga_satuan),
    	]);

    	$transaksi = st_Transaksi_pengeluaran::find($request->id_transaksi) ?? st_Transaksi_pengeluaran::create([
    		'id' => $request->id_transaksi,
    		'tanggal' => $request->tanggal,
    		'status' => 'Pending'
    	]);

    	$detailTransaksi = st_DetailTransaksi_pengeluaran::create([
    		'id_transaksi' => $transaksi->id,
    		'id_barang' => $barang->id,
    		'unit' => $request->unit
    	]);

    	return response()->json([
    		'message' => 'Barang berhasil ditambahkan'
    	]);
    }

    public function getDataPembeli($transaksi)
    {
        $data = [
            'pembeli' => NULL,
        ];

        $transaksi = st_Transaksi_pengeluaran::find($transaksi);
        
        if($transaksi) {
            $data['pembeli'] = new st_PembeliPengeluaranResource($transaksi);
        }

        return response()->json([
            'message' => 'Data pembeli',
            'data' => $data
        ]);
    }

    public function saveDataPembeli(Request $request, $transaksi)
    {
        // return response()->json(['data' => $request->all()]);

        $transaksi = st_Transaksi_pengeluaran::find($request->id_transaksi);

        if($transaksi) {
            $transaksi->update([
                'nama_toko' => $request->nama_toko,
            ]);

        } else {
            st_Transaksi_pengeluaran::create([
                'id' => $request->id_transaksi,
                'tanggal' => $request->tanggal,
                'nama_toko' => $request->nama_toko,
                'status' => 'Pending'
            ]);
        } 

        return response()->json([
            'message' => 'Data pembeli berhasil disimpan'
        ]);
    }

    public function editBarangTransaksi(Request $request, $transaksi)
    {
    	// return response()->json(['data' => $request->all()]);
    	$transaksi = st_Transaksi_pengeluaran::find($transaksi);
    	$detailTransaksi = st_DetailTransaksi_pengeluaran::find($request->detail_transaksi);

    	if($detailTransaksi) {
    		$barang = $detailTransaksi->barang;

    		$barang->update([
	    		'nama_barang' => $request->nama_barang,
	    		'harga_satuan' => str_replace(".", "", $request->harga_satuan),
	    	]);

	    	$detailTransaksi->update([
	    		'unit' => $request->unit
	    	]);
    	}

    	return response()->json([
    		'message' => 'Detail transaksi berhasil diubah',
    		'data' => null,
    	]);
    }

    public function deleteBarangTransaksi(Request $request, $transaksi)
    {
    	$transaksi = st_Transaksi_pengeluaran::find($transaksi);
    	$detailTransaksi = st_DetailTransaksi_pengeluaran::find($request->detail_transaksi);

    	if($detailTransaksi) {
    		$barang = $detailTransaksi->barang;
    		$detailTransaksi->delete();
    		$barang->delete();
    	}

    	return response()->json([
    		'message' => 'Detail transaksi sudah terhapus',
    		'data' => null,
    	]);
    }

    public function simpanTransaksi(Request $request, $transaksi)
    {
    	// return response()->json(['data' => $request->all()]);
    	$transaksi = st_Transaksi_pengeluaran::find($transaksi);

    	if($transaksi) {
	    	$transaksi->update([
	    		'status' => 'Success'
	    	]);
    	}

    	return response()->json([
    		'message' => 'Transaksi berhasil disimpan',
    		'data' => $transaksi,
    	]);
    }

    public function deleteTransaksi($transaksi)
    {
        // return response()->json(['data' => $request->all()]);
        $transaksi = st_Transaksi_pengeluaran::find($transaksi);

        if($transaksi) {
            $id_barang = [];
            foreach($transaksi->detailTransaksi as $value) {
                $id_barang[] = $value->id_barang;
            }

            $transaksi->detailTransaksi()->delete();
            $barang = st_barang_pengeluaran::whereIn('id', $id_barang)->delete();
            $transaksi->delete();
        }

        return response()->json([
            'message' => 'Transaksi berhasil dihapus',
            'data' => $transaksi,
        ]);
    }

    public function getHargaTransaksi($transaksi)
    {
    	$data = null;

    	$transaksi = st_Transaksi_pengeluaran::find($transaksi);
    	
    	if( ! $transaksi || ! $transaksi->detailTransaksi) {
    		return response()->json($data);
    	}

    	$detailTransaksi = $transaksi->detailTransaksi;

    	$totalHarga = 0;

    	foreach($detailTransaksi as $value) {
    		$totalHarga += $value->barang->harga_satuan * $value->unit;
    	}

    	$keuntunganBersih = $totalHarga - $totalModal;
        
        $data = [
        	'total_harga' 			=> $totalHarga,
        	'total_harga_rp'		=> "Rp. " . number_format($totalHarga, 0, '', '.'),
        ];

        return response()->json([
        	'message' => 'Data harga transaksi',
        	'data' => $data
        ]);
    }
}
