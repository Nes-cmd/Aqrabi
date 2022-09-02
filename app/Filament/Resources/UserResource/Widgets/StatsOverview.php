<?php

namespace App\Filament\Resources\UserResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatsOverview extends BaseWidget
{
    public static function canView():bool
    {
        return 1;
    }
    protected function getCards(): array
    {
        $customers = Card::make('Customers', '192.1k')
                        ->description('32k increase')
                        ->descriptionIcon('heroicon-s-trending-up')
                        ->chart([0, 2, 10, 3, 15, 4, 17])
                        ->color('danger');
        $orders = Card::make('Customers', '192.1k')
                        ->description('32k increase')
                        ->descriptionIcon('heroicon-s-trending-up')
                        ->chart([0, 2, 10, 3, 15, 4, 17])
                        ->color('danger');
        if(auth()->user()->hasVerifiedRole('admin')){
            return [
                $customers,
                $orders
            ];
        }
        return [
            $customers,
            $orders
        ];
        
            // Card::make('Processed', '192.1k')
            //     ->color('success')
            //     ->extraAttributes([
            //         'class' => 'cursor-pointer',
            //         'wire:click' => '$emitUp("setStatusFilter", "processed")',
            //     ]),
    }
}
