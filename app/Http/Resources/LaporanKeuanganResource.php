<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Helpers\PerhitunganLaporan;

class LaporanKeuanganResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $perhitunganLaporan = new PerhitunganLaporan();
        $perhitunganLaporan->handle($this);

        return [
            'tanggal'               => $this->tanggal,
            'total_modal'           => $perhitunganLaporan->convertToRp($perhitunganLaporan->getTotalModal()),
            'total_pemasukan'       => $perhitunganLaporan->convertToRp($perhitunganLaporan->getTotalPemasukan()),
            'total_pengeluaran'     => $perhitunganLaporan->convertToRp($perhitunganLaporan->getTotalPengeluaran()),
            'total_kas_besar'       => $perhitunganLaporan->convertToRp($perhitunganLaporan->getTotalKasBesar()),
            'sisa_utang_modal'      => $perhitunganLaporan->convertToRp($perhitunganLaporan->getSisaUtangModal()),
        ];
    }
}
