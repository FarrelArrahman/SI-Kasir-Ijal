<?php 

namespace App\Helpers;

class st_PerhitunganTransaksi {

	public $data;
	public $totalHarga = 0;

	public function handle($data)
	{
		$this->data = $data;
	}

	public function getTotalHarga()
	{
		foreach($this->data as $value) {
			$this->totalHarga += $value->barang->harga_satuan * $value->unit;
		}

		return $this->totalHarga;
	}

	public function convertToRp($nominal)
	{
		return "Rp. " . number_format($nominal, 0, '', '.');
	}

}

?>