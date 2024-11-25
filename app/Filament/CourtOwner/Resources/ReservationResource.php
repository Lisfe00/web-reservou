<?php

namespace App\Filament\CourtOwner\Resources;

use App\Filament\CourtOwner\Resources\ReservationResource\Pages;
use App\Filament\CourtOwner\Resources\ReservationResource\RelationManagers;
use App\Models\Court;
use App\Models\Date;
use App\Models\Reservation;
use App\Models\User;
use Carbon\Carbon;
use Faker\Provider\ar_EG\Text;
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

    public static function getModelLabel(): string
    {
        return 'Reservas';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(

                fn (Builder $query) => Court::getReservs($query)
            )
            ->columns([
                TextColumn::make('user_id')
                    ->label('Usuário')
                    ->formatStateUsing(function ($state) {
                        return User::find($state)->name;
                    }),
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
                //
            ])
            ->bulkActions([
                //
            ]);
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
