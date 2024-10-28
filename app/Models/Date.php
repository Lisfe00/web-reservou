<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    
    protected $fillable = [
        'court_id',
        'date',
        'status',
    ];

    public function court()
    {
        return $this->belongsTo(Court::class);
    }
}
