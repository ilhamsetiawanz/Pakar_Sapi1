<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aturan extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'id_gejala',
        'id_penyakit'
    ];

    /**
     * Get the gejala that owns the aturan.
     */
    public function gejala()
    {
        return $this->belongsTo(DataGejala::class, 'id_gejala');
    }

    public function penyakit()
    {
        return $this->belongsTo(Penyakit::class, 'id_penyakit');
    }
}
