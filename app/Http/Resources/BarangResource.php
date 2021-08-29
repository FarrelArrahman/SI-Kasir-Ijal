<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BarangResource extends JsonResource
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
            'harga_jual'        => $this->harga_jual,
            'harga_jual_rp'     => number_format($this->harga_jual, 0, '', '.'),
            'harga_modal'       => $this->harga_modal,
            'harga_modal_rp'     => number_format($this->harga_modal, 0, '', '.'),
        ];
    }
}
