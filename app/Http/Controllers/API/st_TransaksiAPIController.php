<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\st_Barang;
use App\Models\st_Transaksi;
use App\Models\st_DetailTransaksi;
use App\Http\Resources\st_TransaksiResource;
use App\Http\Resources\st_PembeliResource;
use Carbon\Carbon;
use Illuminate\Http\Request;

class st_TransaksiAPIController extends Controller
{
    public function getIdTransaksi()
    {
    	$transaksi = st_Transaksi::where('tanggal', today())->latest()->first();

    	if($transaksi && $transaksi->status == "Pending") {
    		$transaksi = st_Transaksi::where('tanggal', today())->count();
    	} else {
    		$transaksi = st_Transaksi::where('tanggal', today())->count() + 1;
    	}
        
        $data = [
        	'id_transaksi' => 'TSB' . today()->format('dmy') . sprintf('%04d', $transaksi),
        ];

        return response()->json([
        	'message' => 'ID transaksi terbaru',
        	'data' => $data
        ]);
    }

    public function getIdTransaksiByTanggal($tanggal)
    {
        $date = Carbon::parse($tanggal);
        $transaksi = st_Transaksi::where('tanggal', $date)->latest()->first();

        if($transaksi && $transaksi->status == "Pending") {
            $transaksi = st_Transaksi::where('tanggal', $date)->count();
        } else {
            $transaksi = st_Transaksi::where('tanggal', $date)->count() + 1;
        }
        
        $data = [
            'id_transaksi' => 'TSB' . $date->format('dmy') . sprintf('%04d', $transaksi),
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

    	$transaksi = st_Transaksi::find($transaksi);
        
        if($transaksi) {
        	$data['transaksi'] = new st_TransaksiResource($transaksi);
        }

        return response()->json([
        	'message' => 'Daftar barang transaksi',
        	'data' => $data
        ]);
    }

    public function addBarangTransaksi(Request $request, $transaksi)
    {
    	// return response()->json(['data' => $request->all()]);

    	$barang = st_Barang::create([
    		'nama_barang' => $request->nama_barang,
    		'harga_jual' => str_replace(".", "", $request->harga_jual),
            'harga_modal' => str_replace(".", "", $request->harga_modal),
    	]);

    	$transaksi = st_Transaksi::find($request->id_transaksi) ?? st_Transaksi::create([
    		'id' => $request->id_transaksi,
    		'tanggal' => $request->tanggal,
    		'status' => 'Pending'
    	]);

    	$detailTransaksi = st_DetailTransaksi::create([
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

        $transaksi = st_Transaksi::find($transaksi);
        
        if($transaksi) {
            $data['pembeli'] = new st_PembeliResource($transaksi);
        }

        return response()->json([
            'message' => 'Data pembeli',
            'data' => $data
        ]);
    }

    public function saveDataPembeli(Request $request, $transaksi)
    {
        // return response()->json(['data' => $request->all()]);

        $transaksi = st_Transaksi::find($request->id_transaksi);

        if($transaksi) {
            $transaksi->update([
                'nama_pembeli' => $request->nama_pembeli,
                'no_telp' => $request->no_telp,
                'alamat' => $request->alamat,
            ]);

        } else {
            st_Transaksi::create([
                'id' => $request->id_transaksi,
                'tanggal' => $request->tanggal,
                'nama_pembeli' => $request->nama_pembeli,
                'no_telp' => $request->no_telp,
                'alamat' => $request->alamat,
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
    	$transaksi = st_Transaksi::find($transaksi);
    	$detailTransaksi = st_DetailTransaksi::find($request->detail_transaksi);

    	if($detailTransaksi) {
    		$barang = $detailTransaksi->barang;

    		$barang->update([
	    		'nama_barang' => $request->nama_barang,
	    		'harga_jual' => str_replace(".", "", $request->harga_jual),
                'harga_modal' => str_replace(".", "", $request->harga_modal),
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
    	$transaksi = st_Transaksi::find($transaksi);
    	$detailTransaksi = st_DetailTransaksi::find($request->detail_transaksi);

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
    	$transaksi = st_Transaksi::find($transaksi);

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
        $transaksi = st_Transaksi::find($transaksi);

        if($transaksi) {
            $id_barang = [];
            foreach($transaksi->detailTransaksi as $value) {
                $id_barang[] = $value->id_barang;
            }

            $transaksi->detailTransaksi()->delete();
            $barang = st_Barang::whereIn('id', $id_barang)->delete();
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

    	$transaksi = st_Transaksi::find($transaksi);
    	
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

        return response()->json([
        	'message' => 'Data harga transaksi',
        	'data' => $data
        ]);
    }
}
