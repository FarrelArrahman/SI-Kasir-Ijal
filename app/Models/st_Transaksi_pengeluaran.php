<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class st_Transaksi_pengeluaran extends Model
{
    use HasFactory;
    
    protected $table = 'st_transaksi_pengeluaran';
    public $primaryKey = 'id';
    public $incrementing = false;
    public $dates = [
        'tanggal'
    ];

    protected $fillable = [
        'id',
        'tanggal',
        'id_cabang',
        'nama_toko',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        //
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        // 
    ];

    public function detailTransaksi()
    {
        return $this->hasMany(st_DetailTransaksi_pengeluaran::class, 'id_transaksi');
    }
}
