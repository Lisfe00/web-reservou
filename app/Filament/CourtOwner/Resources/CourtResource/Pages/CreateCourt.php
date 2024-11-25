<?php

namespace App\Filament\CourtOwner\Resources\CourtResource\Pages;

use App\Filament\CourtOwner\Resources\CourtResource;
use App\Models\Address;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class CreateCourt extends CreateRecord
{
    protected static string $resource = CourtResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = Auth::user()->id;
    
        return $data;
    }

    protected function handleRecordCreation(array $data): Model
    {
        $record =  static::getModel()::create($data);

        $addres = new Address();
        $addres->court_id = $record->id;
        $addres->cep = $data['cep'];
        $addres->street = $data['street'];
        $addres->neighborhood = $data['neighborhood'];
        $addres->city = $data['city'];
        $addres->number = $data['number'];
        $addres->UF = $data['UF'];
        $addres->save();

        return $record;
    }
}
