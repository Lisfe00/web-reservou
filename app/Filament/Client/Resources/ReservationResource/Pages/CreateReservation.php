<?php

namespace App\Filament\Client\Resources\ReservationResource\Pages;

use App\Filament\Client\Resources\ReservationResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateReservation extends CreateRecord
{
    protected static string $resource = ReservationResource::class;
}