<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use App\Http\Resources\TransaksiResource;
use Illuminate\Http\Request;

class TransaksiAPIController extends Controller
{
    public function getIdTransaksi()
    {
    	$transaksi = Transaksi::where('tanggal', today())->latest()->first();

    	if($transaksi && $transaksi->status == "Pending") {
    		$transaksi = Transaksi::where('tanggal', today())->count();
    	} else {
    		$transaksi = Transaksi::where('tanggal', today())->count() + 1;
    	}
        
        $data = [
        	'id_transaksi' => 'TSB' . today()->format('dmy') . sprintf('%04d', $transaksi),
        ];

        return response()->json(['data' => $data]);
    }

    public function getBarangTransaksi($transaksi)
    {
    	$data = [
        	'transaksi' => NULL,
        ];

    	$transaksi = Transaksi::find($transaksi);
        
        if($transaksi) {
        	$data['transaksi'] = new TransaksiResource($transaksi);
        }

        return response()->json(['data' => $data]);
    }

    public function addBarangTransaksi(Request $request, $transaksi)
    {
    	// return response()->json(['data' => $request->all()]);

    	$barang = Barang::create([
    		'nama_barang' => $request->nama_barang,
    		'harga_jual' => $request->harga_jual,
    		'harga_modal' => $request->harga_modal,
    	]);

    	$transaksi = Transaksi::find($transaksi) ?? Transaksi::create([
    		'id' => $request->id_transaksi,
    		'tanggal' => $request->tanggal,
    		'status' => 'Pending'
    	]);

    	$detailTransaksi = DetailTransaksi::create([
    		'id_transaksi' => $transaksi->id,
    		'id_barang' => $barang->id,
    		'unit' => $request->unit
    	]);

    	return response()->json(['data' => 
    		[
    			'transaksi' => $transaksi,
    			'detailTransaksi' => $transaksi->detailTransaksi
    		]
    	]);
    }

    public function deleteBarangTransaksi(Request $request, $transaksi)
    {
    	// return response()->json(['data' => $request->all()]);

    	$transaksi = Transaksi::find($transaksi);
    	$detailTransaksi = DetailTransaksi::find($request->detailTransaksi);

    	if($detailTransaksi) {
    		$barang = $detailTransaksi->barang;
    		$detailTransaksi->delete();
    		$barang->delete();
    	}

    	return response()->json(['data' => 
    		[
    			'transaksi' => $transaksi,
    			'detailTransaksi' => $transaksi->detailTransaksi
    		]
    	]);
    }

    public function getHargaTransaksi($transaksi)
    {
    	$data = null;

    	$transaksi = Transaksi::find($transaksi);
    	
    	if( ! $transaksi || ! $transaksi->detailTransaksi) {
    		return response()->json($data);
    	}

    	$detailTransaksi = $transaksi->detailTransaksi;

    	$totalHarga = 0;
    	$totalModal = 0;

    	foreach($detailTransaksi as $value) {
    		$totalHarga += $value->barang->harga_jual * $value->unit;
    		$totalModal += $value->barang->harga_modal * $value->unit;
    	}

    	$keuntunganBersih = $totalHarga - $totalModal;
        
        $data = [
        	'total_harga' 			=> $totalHarga,
        	'total_harga_rp'		=> "Rp. " . number_format($totalHarga, 0, '', '.'),
        	'total_modal' 			=> $totalModal,
        	'total_modal_rp'		=> "Rp. " . number_format($totalModal, 0, '', '.'),
        	'keuntungan_bersih' 	=> $keuntunganBersih,
        	'keuntungan_bersih_rp'	=> "Rp. " . number_format($keuntunganBersih, 0, '', '.'),
        ];

        return response()->json(['data' => $data]);
    }
}
