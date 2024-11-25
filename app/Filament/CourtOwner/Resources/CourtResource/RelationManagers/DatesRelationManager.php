<?php

namespace App\Filament\CourtOwner\Resources\CourtResource\RelationManagers;

use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DatesRelationManager extends RelationManager
{
    protected static string $relationship = 'dates';

    protected static ?string $title = 'Datas';

    public static function getModelLabel(): string
    {
        return 'data';
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DateTimePicker::make('date')
                    ->seconds(false)
                    ->required()
                    ->label('Data'),
                Forms\Components\Select::make('status')
                    ->options([
                        'available' => 'Disponível',
                        'unavailable' => 'Indisponível',
                    ])
                    ->native(false)
                    ->required()
                    ->label('Status'),
                
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('date')
            ->columns([
                Tables\Columns\TextColumn::make('date')
                    ->label('Data')
                    ->formatStateUsing(function ($state) {
                        return Carbon::parse($state)->format('d/m/Y H:i');
                    }),
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->formatStateUsing(function ($state) {
                        return $state == 'available' ? 'Disponível' : 'Indisponível';
                    }),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
