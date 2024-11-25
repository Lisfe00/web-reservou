<?php

namespace App\Http\Controllers;

use App\Models\Date;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservController extends Controller
{
    public static function reserv(Request $request)
    {
        $date = Date::find($request->hours);

        $user_id = Auth::user()->id;

        $date_id = $date->id;

        $court_id = $date->court_id;

        Reservation::create([
            'user_id' => $user_id,
            'date_id' => $date_id,
            'court_id' => $court_id,
            'status' => 'reserved',
        ]);

        $date->status = 'unavailable';
        $date->save();

        return redirect('/client/reservations');
    }
}
