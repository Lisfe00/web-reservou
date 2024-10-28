<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'court_id',
        'cep',
        'street',
        'neighborhood',
        'city',
        'number',
        'UF',
    ];
}
