<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotoProdukCustom extends Model
{
    use HasFactory;

    protected $table = 'foto_produk_custom';
    public $primaryKey = 'id';

    protected $fillable = [
        'id_produk_custom',
        'path',
        'foto_utama',
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

    public function produkCustom()
    {
        return $this->belongsTo(ProdukCustom::class, 'id_produk_custom', 'id');
    }
}
