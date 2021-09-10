<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Helpers\st_PerhitunganTransaksiPengeluaran;

class st_TransaksiLaporanPengeluaranResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $perhitunganTransaksi = new st_PerhitunganTransaksiPengeluaran();
        $perhitunganTransaksi->handle($this->detailTransaksi);

        return [
            'tanggal'               => $this->tanggal->format('d/m/Y'),
            'id_transaksi'          => $this->id,
            'total_harga'           => $perhitunganTransaksi->convertToRp($perhitunganTransaksi->getTotalHarga()),
        ];
    }
}
