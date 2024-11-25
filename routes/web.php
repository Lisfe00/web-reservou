<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\ReservController;
use Illuminate\Support\Facades\Route;

Route::post('/reserv', [ReservController::class, 'reserv'])->name('reserv');

Route::get('/login', function () {
    return view('login');
});

Route::get('/index', function () {
    return view('index');
});

Route::get('/court-view', function () {
    return view('court-view');
});