<?php

namespace App\Filament\Client\Resources;

use App\Filament\Client\Resources\CourtResource\Pages;
use App\Filament\Client\Resources\CourtResource\RelationManagers;
use App\Models\Address;
use App\Models\Court;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Support\Enums\FontWeight;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Session;

use function Laravel\Prompts\select;

class CourtResource extends Resource
{
    protected static ?string $model = Court::class;

    // protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function getBreadcrumb(): string
    {
        return '';
    }

    public static function getModelLabel(): string
    {
        return 'quadra';
    }

    public function getHeading(): string
    {
        return 'Quadras';
    }


    public static function table(Table $table): Table
    {
        return $table
        ->modifyQueryUsing(function (Builder $query) {
            return Court::getQueryClient();
        })
        ->columns([
            Tables\Columns\Layout\Stack::make([
                Tables\Columns\ImageColumn::make('image')
                        ->height('100%')
                        ->width('100%'),
                    Tables\Columns\TextColumn::make('name')
                        ->searchable()
                        -> size('lg')
                        ->weight(FontWeight::Bold),
            ])->space(3),
        ])
        ->paginated(false)
        ->filters([
            SelectFilter::make('city')
                ->label('Cidade')
                ->multiple()
                ->searchable()
                ->options(Address::getCity())
                ->query(function(Builder $query, $data) {
                    Court::getQueryCityFilter($query, $data['values'])->toSql();
                })
        ])
        ->recordAction('see_more')
        ->recordUrl(null)
        ->contentGrid([
            'md' => 2,
            'xl' => 3,
        ])
        ->actions([
            Tables\Actions\Action::make('see_more')
                ->label('Ver mais detalhes')
                ->button()
                -> extraAttributes(['class'=> "button"])
                ->action(function($record) {
                    Session::forget('record');          
                    Session::put('record', $record->id);
                    return redirect('client/view-page');
                }),
        ])
        ->bulkActions([
    
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
            'index' => Pages\ListCourts::route('/'),
            'create' => Pages\CreateCourt::route('/create'),
            'edit' => Pages\EditCourt::route('/{record}/edit'),
        ];
    }
}
