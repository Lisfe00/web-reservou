<?php

namespace App\Filament\CourtOwner\Resources\CourtResource\Pages;

use App\Filament\CourtOwner\Resources\CourtResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCourt extends EditRecord
{
    protected static string $resource = CourtResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['cep'] = $this->record->address()->first()->cep;
        $data['street'] = $this->record->address()->first()->street;
        $data['neighborhood'] = $this->record->address()->first()->neighborhood;
        $data['city'] = $this->record->address()->first()->city;
        $data['number'] = $this->record->address()->first()->number;
        $data['UF'] = $this->record->address()->first()->UF;

        return $data;
    }

    public function afterSave(bool $shouldRedirect = true, bool $shouldSendSavedNotification = true): void
    {
        $this->validate();

        $addres = $this->record->address()->first();
        $addres->cep = $this->data['cep'];
        $addres->street = $this->data['street'];
        $addres->neighborhood = $this->data['neighborhood'];
        $addres->city = $this->data['city'];
        $addres->number = $this->data['number'];
        $addres->UF = $this->data['UF'];
        $addres->save();
    }
}
