<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solusi extends Model
{
    use HasFactory;

    
    /**
     * fillable
     *
     * @var array
     */

     protected $fillable = [
        'solusi',
        'Pencegahan',
        'kd_penyakit'
    ];

    public function Penyakit()
    {
        return $this->belongsTo(Penyakit::class, 'kd_penyakit', 'id');

    }
}
