<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Consultant extends Model
{
    use HasFactory;

    public $timestamps = false;

    // setup email as primary key
    protected $primaryKey = 'email';
    protected $keyType = 'string';
    public $incrementing = false;
}
