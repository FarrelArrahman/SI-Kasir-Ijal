<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class st_Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';
    public $primaryKey = 'id';
    public $incrementing = false;
    public $dates = [
        'tanggal'
    ];

    protected $fillable = [
        'id',
        'tanggal',
        'id_cabang',
        'nama_pembeli',
        'no_telp',
        'alamat',
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
        return $this->hasMany(st_DetailTransaksi::class, 'id_transaksi');
    }

    public function cabang()
    {
        return $this->belongsTo(st_Cabang::class, 'id_cabang', 'id');
    }
}
