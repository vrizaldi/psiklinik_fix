<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable = [
        'mood_level'
    ];

    public function user() {
        return $this->belongsTo('user', 'user_email', 'email');
    }
}
