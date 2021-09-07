<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class st_Cabang extends Model
{
    use HasFactory;

    protected $table = 'cabang';
    public $primaryKey = 'id';

    protected $fillable = [
        'kode_cabang',
        'nama_cabang',
        'alamat_cabang',
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
