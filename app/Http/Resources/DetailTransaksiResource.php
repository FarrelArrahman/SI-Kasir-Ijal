<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\BarangResource;

class DetailTransaksiResource extends JsonResource
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
            'id_detail_transaksi'   => $this->id,
            'id_barang'             => $this->barang->id,
            'tanggal'               => $this->transaksi->tanggal->format('d/m/Y'),
            'nama_barang'           => $this->barang->nama_barang,
            'harga_jual'            => $this->barang->harga_jual,
            'harga_modal'           => $this->barang->harga_modal,
            'harga_jual_rp'         => "Rp. " . number_format($this->barang->harga_jual, 0, '', '.'),
            'harga_modal_rp'        => "Rp. " . number_format($this->barang->harga_modal, 0, '', '.'),
            'unit'                  => $this->unit
        ];
    }
}
