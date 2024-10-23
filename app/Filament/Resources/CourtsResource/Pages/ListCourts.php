<?php

namespace App\Filament\Resources\CourtsResource\Pages;

use App\Filament\Resources\CourtsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCourts extends ListRecords
{
    protected static string $resource = CourtsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
