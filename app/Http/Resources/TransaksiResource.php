<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\DetailTransaksiResource;

class TransaksiResource extends JsonResource
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
            'id_transaksi'      => $this->id,
            'tanggal_transaksi' => $this->tanggal,
            'status'            => $this->status,
            'detail'            => DetailTransaksiResource::collection($this->detailTransaksi),
        ];
    }
}
