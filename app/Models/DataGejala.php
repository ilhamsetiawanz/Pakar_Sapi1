<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataGejala extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'KodeGejala',
        'NamaGejala'
    ];

    /**
     * Get the aturan for the gejala.
     */
    public function aturan()
    {
        return $this->hasMany(Aturan::class, 'id_gejala', 'id');
    }
}
