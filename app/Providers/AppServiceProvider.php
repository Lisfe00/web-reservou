<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use BezhanSalleh\PanelSwitch\PanelSwitch;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        PanelSwitch::configureUsing(function (PanelSwitch $panelSwitch) {
            $panelSwitch
                ->visible(function (){
                    if(auth()->user()->hasRole('super_admin')){
                        return true;
                    }else{
                        return false;
                    }
                })
                ->modalHeading(__('Available Panels'))
                ->labels([
                    'admin' => 'Admin',
                    'client' => 'Cliente',
                    'courtOwner' => 'Gerente de Quadra',
                ])
                ->icons([
                    'admin' => 'heroicon-o-shield-check',
                    'courtOwner' => 'heroicon-o-chart-pie',
                    'client' => 'heroicon-o-user',
                ], $asImage = false)
                ->iconSize(33);

        });
    }
}
