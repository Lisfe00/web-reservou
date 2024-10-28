<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\Role;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Leandrocfe\FilamentPtbrFormFields\Document;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    public static function getModelLabel(): string
    {
        return 'usuário';
    }

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Nome')
                            ->required()
                            ->columnSpan(2),
                    ]),
                    Section::make('')
                    ->schema([
                        Forms\Components\Select::make('roles')
                            ->label('Função')
                            ->relationship('roles', 'name')
                            ->options(fn() => Role::getRolesToSelect())
                            ->multiple()
                            ->native(false)
                            ->required(),
                        Document::make('cpf')
                            ->label('CPF')
                            ->cpf()
                            ->required()
                            ->maxLength(15),
                        Forms\Components\TextInput::make('phone')
                            ->label('Telefone'),
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->required(),
                    ])
                    ->columns(3),
                    Section::make('')
                    ->schema([
                        Forms\Components\TextInput::make('password')
                            ->label('Senha')
                            ->password()
                            ->required(
                                fn (string $operation): bool => $operation === 'create' // somente requerido em crete
                            )
                            ->dehydrated(
                                fn (?string $state) => filled($state)
                            )
                            ->confirmed()
                            ->validationAttribute('Senha'),

                        Forms\Components\TextInput::make('password_confirmation')
                            ->label('Confirmar senha')
                            ->password()
                            ->required(
                                fn (string $operation): bool => $operation === 'create' // somente requerido em crete
                            )
                            ->requiredWith('password')
                            ->dehydrated(
                                fn (?string $state) => filled($state)
                            ),
                    ])
                    ->columns(2),
                ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nome'),
                TextColumn::make('email')
                    ->label('Email'),
                TextColumn::make('cpf')
                ->label('CPF'),
                TextColumn::make('phone')
                ->label('Telefone'),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
