<?php

namespace App\Filament\Client\Resources\CourtResource\Pages;

use App\Filament\Client\Resources\CourtResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\View\View;

class ListCourts extends ListRecords
{
    protected static string $resource = CourtResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }

    public function getHeader(): View
    {
        return view('header');
    }

    public function getBreadcrumb(): ?string
    {
        return null;
    }

    public function getHeading() :string
    {
        return 'Quadras';
    }
}
