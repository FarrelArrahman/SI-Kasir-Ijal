<?php 

namespace App\Helpers;

class st_PerhitunganTransaksi {

	public $data;
	public $totalHarga = 0;
	public $totalModal = 0;
	public $keuntunganBersih = 0;

	public function handle($data)
	{
		$this->data = $data;
	}

	public function getTotalHarga()
	{
		foreach($this->data as $value) {
			$this->totalHarga += $value->barang->harga_jual * $value->unit;
		}

		return $this->totalHarga;
	}

	public function getTotalModal()
	{
		foreach($this->data as $value) {
			$this->totalModal += $value->barang->harga_modal * $value->unit;
		}

		return $this->totalModal;
	}

	public function getKeuntunganBersih()
	{
		$this->keuntunganBersih = $this->totalHarga - $this->totalModal;

		return $this->keuntunganBersih;
	}

	public function convertToRp($nominal)
	{
		return "Rp. " . number_format($nominal, 0, '', '.');
	}

}

?>