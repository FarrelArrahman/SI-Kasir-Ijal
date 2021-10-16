<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Hashids\Hashids;

class Stok extends Model
{
    use HasFactory;

    protected $table = 'stok';
    public $primaryKey = 'id';

    protected $fillable = [
        'judul',
        'harga',
        'size',
        'id_type',
        'keterangan',
        'diskon',
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
        'id_hash', 'foto_utama', 'nama_type'
    ];

    public function foto()
    {
        return $this->hasMany(FotoStok::class, 'id_stok');
    }

    public function fotoUtama()
    {
        return $this->foto->where('foto_utama', 1)->first() ?? $this->foto->first();
    }

    public function type()
    {
        return $this->belongsTo(Type::class, 'id_type', 'id');
    }

    public function getIdHashAttribute()
    {
        return (new Hashids('', env('HASHIDS_PAD', 32)))->encode($this->id);
    }

    public function getFotoUtamaAttribute()
    {
        return asset($this->fotoUtama() ? 'storage/' . $this->fotoUtama()->path : 'no-preview.png');
    }

    public function getNamaTypeAttribute()
    {
        return $this->type->nama_type;
    }
}
