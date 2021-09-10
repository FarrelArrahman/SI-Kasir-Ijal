<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Helpers\PerhitunganPengeluaranLaporan;

class st_LaporanKeuanganPengeluaranResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $perhitunganLaporan = new PerhitunganPengeluaranLaporan();
        $perhitunganLaporan->handle($this);

        return [
            'tanggal'               => $this->tanggal,
            'total_pengeluaran'     => $perhitunganLaporan->convertToRp($perhitunganLaporan->getTotalPengeluaran()),
        ];
    }
}