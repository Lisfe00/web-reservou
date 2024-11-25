<?php

namespace App\Filament\Client\Pages;

use App\Models\Court;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Session;

class ViewPage extends Page
{
    // protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationLabel = '‎';
 
    protected static ?int $navigationSort = 3;

    public $court;

    public function getHeading(): string
    {
        $name = $this->court->name;

        return $name;
    }

    public function __construct() {
        $this->court = Court::where('id', Session::get('record'))->first();
    }


    protected static string $view = 'filament.client.pages.view-page';
}
