<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $table = 'type';
    public $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'nama_type',
        'deskripsi',
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

    protected $appends = [
        // 
    ];

    public function stok()
    {
        return $this->hasMany(Stok::class, 'id_type');
    }

    public function produkCustom()
    {
        return $this->hasMany(ProdukCustom::class, 'id_type');
    }

    public static function aktif()
    {
    	return self::where('status', 'Aktif')->get();
    }
}
