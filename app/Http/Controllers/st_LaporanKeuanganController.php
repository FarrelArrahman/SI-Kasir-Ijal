<?php

namespace App\Http\Controllers;

use App\Models\st_Barang;
use App\Models\st_Cabang;
use App\Models\st_Transaksi;
use App\Models\st_DetailTransaksi;
use Illuminate\Http\Request;
use DB;

class st_LaporanKeuanganController extends Controller
{
    public function index()
    {
        $cabang = st_Cabang::where('status', 1)->get();
    	$transaksi = st_Transaksi::all();
    	$month = [
    		// '0' => 'Semua Bulan',
    		'1' => 'Januari',
    		'2' => 'Februari',
    		'3' => 'Maret',
    		'4' => 'April',
    		'5' => 'Mei',
    		'6' => 'Juni',
    		'7' => 'Juli',
    		'8' => 'Agustus',
    		'9' => 'September',
    		'10' => 'Oktober',
    		'11' => 'November',
    		'12' => 'Desember',
    	];

    	$year = [];

    	foreach ($transaksi as $value) {
    		if( ! in_array($value->tanggal->format('Y'), $year)) {
    			$year[] = $value->tanggal->format('Y');
    		}
    	}

    	return view('st_laporan_keuangan.index', compact('cabang', 'month', 'year'));
    }
}
