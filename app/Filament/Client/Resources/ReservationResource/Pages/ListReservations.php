<?php

namespace App\Filament\Client\Resources\ReservationResource\Pages;

use App\Filament\Client\Resources\ReservationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListReservations extends ListRecords
{
    protected static string $resource = ReservationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
