<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class st_PembeliResource extends JsonResource
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
            'cabang'        => $this->cabang,
            'nama_pembeli'  => $this->nama_pembeli,
            'no_telp'       => $this->no_telp,
            'alamat'        => $this->alamat,
        ];
    }
}
