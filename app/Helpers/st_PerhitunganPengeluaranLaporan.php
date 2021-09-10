<?php 

namespace App\Helpers;

class st_PerhitunganLaporan {

	public $data;
	public $totalPengeluaran = 0;

	public function handle($data)
	{
		$this->data = $data;
	}

	public function getLaporan($month, $year)
	{
		return [
			'tanggal' => $month . '/' . $year,
			'total_pengeluaran' => $this->convertToRp($this->getTotalPengeluaran()),
		];
	}

	public function getTotalPengeluaran()
	{
		foreach($this->data as $transaksi) {
			foreach($transaksi->detailTransaksi as $detailTransaksi) {
				$this->totalPengeluaran += $detailTransaksi->barang->harga_satuan * $detailTransaksi->unit;
			}
		}
		return $this->totalPengeluaran;
	}

	public function convertToRp($nominal)
	{
		return "Rp. " . number_format($nominal, 0, '', '.');
	}

}

?>