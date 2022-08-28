<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Filament\Facades\Filament;
use Filament\Navigation\NavigationGroup;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Filament::serving(function () {
            Filament::registerNavigationGroups([
                NavigationGroup::make()
                     ->label('Products')
                     ->icon('heroicon-s-shopping-cart'),
                NavigationGroup::make()
                    ->label('Orders')
                    ->icon('heroicon-s-trending-up')
                    ->collapsed(),
                NavigationGroup::make()
                    ->label('Slider & Deal of day')
                    ->icon('heroicon-s-pencil'),
                NavigationGroup::make()
                    ->label('User & Roles')
                    ->icon('heroicon-s-user-group'),
                NavigationGroup::make()
                    ->label('Extras')
                    ->icon('heroicon-s-cog')
                    ->collapsed(),
            ]);
        });

        $menus = \App\Models\MainCategory::with('subCategory')->get();
        View::share('menus', $menus);

    }
}
