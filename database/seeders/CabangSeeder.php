<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\st_Cabang;

class CabangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        st_Cabang::insert([
        	[
	        	'kode_cabang' => 'Cabang 1',
	        	'nama_cabang' => 'Cabang Musi',
	        	'alamat' => 'Jl. Tukad Musi',
	        	// 'status' => 1,
	        ],
	        [
	        	'kode_cabang' => 'Cabang 2',
	        	'nama_cabang' => 'Cabang Badung',
	        	'alamat' => 'Jl. Tukad Badung',
	        	// 'status' => 1,
	        ],
	    ]);
    }
}
