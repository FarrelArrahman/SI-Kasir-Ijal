<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\st_Cabang;

class st_CabangAPIController extends Controller
{
    public function getListCabang()
    {
        $cabang = st_Cabang::where('status', 1)->get();
    	return response()->json([
    		'message' => 'Data cabang',
    		'data' => $cabang,
    	]);
    }
}
