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


    public static function getCity(){
        $cities = Self::get()->pluck('city', 'city')->toArray();

        return array_unique($cities);
    }
}
