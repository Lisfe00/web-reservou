<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Court extends Model
{
    protected $fillable = [
        'name',
        'capacity',
        'hour_value',
        'has_parking',
        'image',
    ];

    public function address(): HasOne
    {
        return $this->hasOne(Address::class);
    }
}
