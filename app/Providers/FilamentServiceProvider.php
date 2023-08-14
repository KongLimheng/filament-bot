<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Filament\Navigation\NavigationGroup;
use Illuminate\Support\ServiceProvider;

class FilamentServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Filament::registerNavigationGroups([
            'Shop',
            'Blog',
        ]);
        // Filament::serving(function () {
        //     Filament::registerNavigationGroups([
        //         NavigationGroup::make()
        //             ->label('Shop')
        //             ->icon('heroicon-s-shopping-cart'),
        //         NavigationGroup::make()
        //             ->label('Blog')
        //             ->icon('heroicon-s-pencil'),
        //         NavigationGroup::make()
        //             ->label('Settings')
        //             ->icon('heroicon-s-cog')
        //             ->collapsed(),
        //     ]);
        // });

        Filament::registerViteTheme('resources/css/app.css');
    }
}
