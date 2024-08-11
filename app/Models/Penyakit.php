<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyakit extends Model
{
    use HasFactory;

    
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'Penyakit',
        'KodePenyakit',
        'image',
        'deskripsi'
    ];

    
    /**
     * image
     *
     * @return Attribute
     */
    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($image) => url('/storage/asset/' . $image),
        );
    }

    public function Aturan()
    {
        return $this->hasMany(Aturan::class, 'id_penyakit', 'id');
    }

    public function Solusi()
    {
        return $this->hasOne(Solusi::class, 'kd_penyakit', 'id');
    }
    
    public function Laporan()
    {
        return $this->hasMany(Laporan_Bulanan::class, 'kdPenyakit', 'id');
    }
}
