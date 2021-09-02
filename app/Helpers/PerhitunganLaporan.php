<?php 

namespace App\Helpers;

class PerhitunganLaporan {

	public $data;
	public $totalModal = 0;
	public $totalHarga = 0;
	public $totalPemasukan = 0;
	public $totalPengeluaran = 0;
	public $totalKasBesar = 0;
	public $sisaUtangModal = 0;

	public function handle($data)
	{
		$this->data = $data;
	}

	public function getLaporan($month, $year)
	{
		return [
			'tanggal' => $month . '/' . $year,
			'total_modal' => $this->convertToRp($this->getTotalModal()),
			'total_harga' => $this->convertToRp($this->getTotalHarga()),
			'total_pemasukan' => $this->convertToRp($this->getTotalPemasukan()),
			'total_pengeluaran' => $this->convertToRp($this->getTotalPengeluaran()),
			'total_kas_besar' => $this->convertToRp($this->getTotalKasBesar()),
			'sisa_utang_modal' => $this->convertToRp($this->getSisaUtangModal()),
		];
	}

	public function getTotalModal()
	{
		foreach($this->data as $transaksi) {
			foreach($transaksi->detailTransaksi as $detailTransaksi) {
				$this->totalModal += $detailTransaksi->barang->harga_modal * $detailTransaksi->unit;
			}
		}

		return $this->totalModal;
	}

	public function getTotalHarga()
	{
		foreach($this->data as $transaksi) {
			foreach($transaksi->detailTransaksi as $detailTransaksi) {
				$this->totalHarga += $detailTransaksi->barang->harga_jual * $detailTransaksi->unit;
			}
		}

		return $this->totalHarga;
	}

	public function getTotalPemasukan()
	{
		$this->totalPemasukan = $this->totalHarga - $this->totalModal;
		return $this->totalPemasukan;
	}

	public function getTotalPengeluaran()
	{
		return $this->totalPengeluaran;
	}

	public function getTotalKasBesar()
	{
		return $this->totalKasBesar;
	}

	public function getSisaUtangModal()
	{
		return $this->sisaUtangModal;
	}

	public function convertToRp($nominal)
	{
		return "Rp. " . number_format($nominal, 0, '', '.');
	}

}

?>