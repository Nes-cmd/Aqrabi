<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Filament\Facades\Filament;
use Filament\Navigation\NavigationGroup;
use Illuminate\Support\Facades\View;
use App\Filament\Pages\Settings;
use App\Filament\Resources\ProductResource;
use Filament\Navigation\NavigationBuilder;
use Filament\Navigation\NavigationItem;
use Filament\Navigation\UserMenuItem;

class AppServiceProvider extends ServiceProvider
{
    protected $var;
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
        \Illuminate\Pagination\Paginator::useBootstrapFive();
        // Filament::serving(function () {
        //     Filament::registerNavigationGroups([
        //         NavigationGroup::make()
        //              ->label('Products')
        //              ->icon('heroicon-s-shopping-cart'),
        //         NavigationGroup::make()
        //             ->label('Orders')
        //             ->icon('heroicon-s-trending-up')
        //             ->collapsed(),
        //         NavigationGroup::make()
        //             ->label('Slider & Deal of day')
        //             ->icon('heroicon-s-pencil'),
        //         NavigationGroup::make()
        //             ->label('User & Roles')
        //             ->icon('heroicon-s-user-group'),
        //         NavigationGroup::make()
        //             ->label('Extras')
        //             ->icon('heroicon-s-cog')
        //             ->collapsed(),
        //     ]);
        // });

        // Filament::navigation(function (NavigationBuilder $builder): NavigationBuilder {
        //     if(auth()->user() && auth()->user()->hasRole('admin')){
        //         return  $builder->items([
        //             NavigationItem::make('Dashboard')
        //                 ->icon('heroicon-o-home')
        //                 ->isActiveWhen(fn (): bool => request()->routeIs('filament.pages.dashboard'))
        //                 ->url(route('filament.pages.dashboard')),
        //                 ...ProductResource::getNavigationItems()
        //         ]);
        //    }
        //    return  $builder->items([
        //     NavigationItem::make('Dashboard')
        //         ->icon('heroicon-o-home')
        //         ->isActiveWhen(fn (): bool => request()->routeIs('filament.pages.dashboard'))
        //         ->url(route('filament.pages.dashboard')),
        // ]);
        // });
    }
}
