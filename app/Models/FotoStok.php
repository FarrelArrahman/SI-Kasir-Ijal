<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotoStok extends Model
{
    use HasFactory;

    protected $table = 'foto_stok';
    public $primaryKey = 'id';

    protected $fillable = [
        'id_stok',
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

    public function stok()
    {
        return $this->belongsTo(Stok::class, 'id_stok', 'id');
    }
}
