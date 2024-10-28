<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Court extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'capacity',
        'hour_value',
        'has_parking',
        'active',
        'image',
    ];

    public function address(): HasOne
    {
        return $this->hasOne(Address::class);
    }

    public function dates()
    {
        return $this->hasMany(Date::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
