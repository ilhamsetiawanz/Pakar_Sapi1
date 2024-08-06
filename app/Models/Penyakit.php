<?php

namespace App\Models;

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
        'KodePenyakit'
    ];

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
