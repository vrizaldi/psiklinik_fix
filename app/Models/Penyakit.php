<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penyakit extends Model
{
    protected $fillable = [
        'nama_penyakit',
        'keparahan'
    ];
}
