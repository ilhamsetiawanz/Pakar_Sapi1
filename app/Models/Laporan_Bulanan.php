<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan_Bulanan extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */

    protected $fillable = [
        'nama_peternak',
        'kdPenyakit',
        'Tanggal_Diagnosa',
        'gejala'
    ];

    public function Penyakit()
    {
        return $this->belongsTo(Penyakit::class, 'kdPenyakit', 'id');
    }
}
