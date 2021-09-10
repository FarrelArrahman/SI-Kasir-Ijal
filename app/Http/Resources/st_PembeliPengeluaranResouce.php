<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class st_PembeliPengeluaranResource extends JsonResource
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
            'id_transaksi'  => $this->id,
            'nama_toko'  => $this->nama_toko,
        ];
    }
}
