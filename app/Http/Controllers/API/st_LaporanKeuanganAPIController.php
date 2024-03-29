<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\st_Barang;
use App\Models\st_Transaksi;
use App\Models\st_DetailTransaksi;
use App\Http\Resources\st_LaporanKeuanganResource;
use App\Http\Resources\st_TransaksiLaporanResource;
use App\Helpers\st_PerhitunganLaporan;
use App\Models\st_barang_pengeluaran;
use App\Models\st_Transaksi_pengeluaran;
use App\Models\st_DetailTransaksi_pengeluaran;
use App\Http\Resources\st_LaporanKeuanganPengeluaranResource;
use App\Http\Resources\st_TransaksiLaporanPengeluaranResource;
use App\Helpers\st_PerhitunganPengeluaranLaporan;
use Illuminate\Http\Request;
use DataTables;
use DB;

class st_LaporanKeuanganAPIController extends Controller
{
    public function transaksiLaporanKeuangan(Request $request)
    {
    	$params = $request->all();

    	$branch = $params['branch'];
        $month = $params['month'];
    	$year = $params['year'];

    	if(isset($month) && isset($year)) {
    		if(isset($branch)) {    			 
                    $data = st_Transaksi::whereMonth('tanggal', $month)->whereYear('tanggal', $year)->where('id_cabang', $branch)->get();
                    $laporan = st_TransaksiLaporanResource::collection($data);
    		} else {
    			$laporan = [];
    		}
    	}

    	return DataTables::of($laporan)
			->addIndexColumn()
			->addColumn('action', function($row) {
				$actionBtn = "<a data-id='" . $row['id_transaksi'] . "' class='show_transaksi btn btn-primary btn-sm me-1'><i class='fa fa-info-circle'></i></a>";
				$actionBtn .= "<a href='" . route('edit_transaksi_pembelian', $row['id_transaksi']) . "' class='btn btn-warning btn-sm me-1'><i class='fa fa-edit'></i></a>";
				$actionBtn .= "<a data-id='" . $row['id_transaksi'] . "' class='delete_transaksi btn btn-danger btn-sm'><i class='fa fa-times'></i></a>";
				return $actionBtn;
			})
			->rawColumns(['action'])
			->make(true);
    }

    public function laporanKeuangan(st_PerhitunganLaporan $perhitunganLaporan, Request $request)
    {
    	$params = $request->all();

    	$branch = $params['branch'];
        $month = $params['month'];
    	$year = $params['year'];

    	if(isset($month) && isset($year)) {
    		if(isset($branch)) {
                    $data = st_Transaksi::whereMonth('tanggal', $month)->whereYear('tanggal', $year)->where('id_cabang', $branch)->get();
                    $perhitunganLaporan->handle($data);
                    
                    $laporan = $perhitunganLaporan->getLaporan($month, $year);
    		} else {
    			$laporan = [];
    		}
    	}

    	return response()->json([
        	'message' => 'Laporan keuangan ' . $month . '/' . $year,
        	'data' => $laporan
        ]);;
    }
    public function transaksiLaporanKeuanganPengeluaran(Request $request)
    {
    	$params = $request->all();

        $month = $params['month'];
    	$year = $params['year'];

    	if(isset($month) && isset($year)) {
    		if(isset($branch)) {    			 
                    $data = st_Transaksi_pengeluaran::whereMonth('tanggal', $month)->whereYear('tanggal', $year)->get();
                    $laporan = st_TransaksiLaporanPengeluaranResource::collection($data);
    		} else {
    			$laporan = [];
    		}
    	}

    	return DataTables::of($laporan)
			->addIndexColumn()
			->addColumn('action', function($row) {
				$actionBtn = "<a data-id='" . $row['id_transaksi'] . "' class='show_transaksi btn btn-primary btn-sm me-1'><i class='fa fa-info-circle'></i></a>";
				$actionBtn .= "<a href='" . route('edit_transaksi_pengeluaran', $row['id_transaksi']) . "' class='btn btn-warning btn-sm me-1'><i class='fa fa-edit'></i></a>";
				$actionBtn .= "<a data-id='" . $row['id_transaksi'] . "' class='delete_transaksi btn btn-danger btn-sm'><i class='fa fa-times'></i></a>";
				return $actionBtn;
			})
			->rawColumns(['action'])
			->make(true);
    }

    public function laporanKeuanganPengeluaran(st_PerhitunganPengeluaranLaporan $perhitunganLaporan, Request $request)
    {
    	$params = $request->all();

        $month = $params['month'];
    	$year = $params['year'];

    	if(isset($month) && isset($year)) {
    		if(isset($branch)) {
                    $data = st_Transaksi_pengeluaran::whereMonth('tanggal', $month)->whereYear('tanggal', $year)->get();
                    $perhitunganLaporan->handle($data);
                    
                    $laporan = $perhitunganLaporan->getLaporan($month, $year);
    		} else {
    			$laporan = [];
    		}
    	}

    	return response()->json([
        	'message' => 'Laporan keuangan ' . $month . '/' . $year,
        	'data' => $laporan
        ]);;
    }
}
