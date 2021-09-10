<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\st_BarangPengeluaranResource;

class st_DetailTransaksiPengeluaranResource extends JsonResource
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
            'harga_satuan'          => $this->barang->harga_satuan,
            'harga_satuan_rp'       => "Rp. " . number_format($this->barang->harga_satuan, 0, '', '.'),
            'unit'                  => $this->unit
        ];
    }
}
