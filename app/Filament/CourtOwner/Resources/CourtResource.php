<?php

namespace App\Filament\CourtOwner\Resources;

use App\Filament\CourtOwner\Resources\CourtResource\Pages;
use App\Filament\CourtOwner\Resources\CourtResource\RelationManagers;
use App\Models\Court;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CourtResource extends Resource
{
    protected static ?string $model = Court::class;

    public static function getModelLabel(): string
    {
        return 'quadra';
    }

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('user_id')
                    ->label('Usuário')
                    ->options(
                        \App\Models\User::all()->pluck('name', 'id')
                    )
                    ->native(false)
                    ->required(),
                TextInput::make('name')
                    ->label('Nome')
                    ->required(),
                TextInput::make('capacity')
                    ->label('Capacidade')
                    ->required(),
                TextInput::make('hour_value')
                    ->label('Valor hora')
                    ->required(),
                Section::make('')
                    ->columns(2)
                    ->schema([
                        Toggle::make('has_parking')
                        ->label('Possui estacioanmento'),
                        Toggle::make('active')
                        ->label('Ativo'),
                    ]),
                FileUpload::make('image')
                    ->label('Imagem')
                    ->image()
                    ->directory('courts')
                    ->columnSpan(2)
                    ->required(),
                
                TextInput::make('cep')
                    ->label('CEP')
                    ->required(),
                TextInput::make('street')
                    ->label('Rua')
                    ->required(),
                TextInput::make('neighborhood')
                    ->label('Bairro')
                    ->required(),
                TextInput::make('city')
                    ->label('Cidade')
                    ->required(),
                TextInput::make('number')
                    ->label('Numero')
                    ->required(),
                TextInput::make('UF')
                    ->label('UF')
                    ->required(),
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(
                fn (Builder $query) => $query->where('user_id', auth()->user()->id)
            )
            ->columns([
                TextColumn::make('name')
                ->label('Nome'),
                TextColumn::make('capacity')
                ->label('Capacidade'),
                TextColumn::make('hour_value')
                ->label('Valor hora'),
                IconColumn::make('has_parking')
                ->boolean()
                ->label('Possui estacionamento'),
                ToggleColumn::make('active')
                ->label('Ativo'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\DatesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCourts::route('/'),
            'create' => Pages\CreateCourt::route('/create'),
            'edit' => Pages\EditCourt::route('/{record}/edit'),
        ];
    }
}
