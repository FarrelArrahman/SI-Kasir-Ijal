<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class st_barang_pengeluaran extends Model
{
    use HasFactory;
    
    protected $table = 'st_barang_pengeluaran';
    public $primaryKey = 'id';

    protected $fillable = [
        'nama_barang',
        'harga_satuan',
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
}
