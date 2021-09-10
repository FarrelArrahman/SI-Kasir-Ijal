<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class st_BarangPengeluaranResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'nama_barang'       => $this->nama_barang,
            'harga_satuan'        => $this->harga_jual,
            'harga_satuan_rp'     => number_format($this->harga_jual, 0, '', '.'),
        ];
    }
}