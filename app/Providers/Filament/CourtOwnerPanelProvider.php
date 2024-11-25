<?php

namespace App\Providers\Filament;

use Filament\Forms\Components\Field;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Tables\Columns\Column;


class CourtOwnerPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
                ->bootUsing(function(){
                    Field::configureUsing(function(Field $field){
                        $field->translateLabel();
                    });

                    Column::configureUsing(function(Column $column){
                        $column->translateLabel();
                    });
            })
            ->id('courtOwner')
            ->path('courtOwner')
            ->colors([
                'primary' => Color::Amber,
            ])
            ->topNavigation()
            ->favicon(asset('images/icone.svg'))
            ->brandName('Reservou')
            ->login()
            ->brandLogo(asset('images/logo.svg'))
            ->brandLogoHeight('4rem')
            ->discoverResources(in: app_path('Filament/CourtOwner/Resources'), for: 'App\\Filament\\CourtOwner\\Resources')
            ->discoverPages(in: app_path('Filament/CourtOwner/Pages'), for: 'App\\Filament\\CourtOwner\\Pages')
            ->pages([])
            ->discoverWidgets(in: app_path('Filament/CourtOwner/Widgets'), for: 'App\\Filament\\CourtOwner\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
