<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use Illuminate\Http\Request;
use DB;

class LaporanKeuanganController extends Controller
{
    public function index()
    {
    	$transaksi = Transaksi::all();
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

    	return view('laporan_keuangan.index', compact('month', 'year'));
    }
}