<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Reservation extends Model
{
    protected $fillable = [
        'user_id',
        'date_id',
        'court_id',
        'status',
        'link',
    ];

    public function date()
    {
        return $this->belongsTo(Date::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function getQueryClient(){
        return self::query()
            ->where('user_id', Auth::user()->id);
    }
}
