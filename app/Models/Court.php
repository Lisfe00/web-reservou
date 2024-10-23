<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Court extends Model
{
    protected $fillable = [
        'name',
        'capacity',
        'hour_value',
        'has_parking',
    ];
}
