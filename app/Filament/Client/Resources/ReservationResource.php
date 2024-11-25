<?php

namespace App\Filament\Client\Resources;

use App\Filament\Client\Resources\ReservationResource\Pages;
use App\Filament\Client\Resources\ReservationResource\RelationManagers;
use App\Models\Court;
use App\Models\Date;
use App\Models\Reservation;
use Carbon\Carbon;
use Filament\Actions\Action;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReservationResource extends Resource
{
    protected static ?string $model = Reservation::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function getModelLabel(): string
    {
        return 'Minhas Reserva';
    }

    public function getHeading(): string
    {
        return 'Minhas Reservas';
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(function (Builder $query) {
                return Reservation::getQueryClient();
            })
            ->columns([
                TextColumn::make('court_id')
                    ->label('Quadra')
                    ->formatStateUsing(function ($state) {
                        return Court::find($state)->name;
                    }),
                TextColumn::make('date_id')
                    ->label('Data')
                    ->formatStateUsing(function ($state) {
                        return Carbon::parse(Date::find($state)->date)->format('d/m/Y H:i');
                    }),
                TextColumn::make('status')
                    ->label('Status')
                    ->formatStateUsing(function ($state) {
                        return $state == 'reserved' ? 'Reservado' : 'Cancelado';
                    }),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\Action::make('cancel')
                    ->label('Cancelar Reserva')
                    ->requiresConfirmation()
                    ->modalDescription('Tem certeza que deseja cancelar essa reserva?')
                    ->modalHeading('Cancelar reserva')
                    ->button()
                    ->action(function ($record) {
                        $record->update(['status' => 'canceled']);
                        Date::find($record->date_id)->update(['status' => 'available']);
                    }),
            ])
            ->bulkActions([]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListReservations::route('/'),
            // 'create' => Pages\CreateReservation::route('/create'),
            // 'edit' => Pages\EditReservation::route('/{record}/edit'),
        ];
    }
}
