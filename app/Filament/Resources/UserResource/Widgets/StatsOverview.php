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
        return [
            Card::make('Unique views', '192.1k')
                ->description('32k increase')
                ->descriptionIcon('heroicon-s-trending-up')
                ->color('success'),
            Card::make('Unique views', '192.1k')
                ->description('32k increase')
                ->descriptionIcon('heroicon-s-trending-up')
                ->chart([0, 2, 10, 3, 15, 4, 17])
                ->color('danger'),
            Card::make('Average time on page', '3:12')
                ->description('3% increase')
                ->descriptionIcon('heroicon-s-trending-up')
                ->color('success'),
            Card::make('Processed', '192.1k')
                ->color('success')
                ->extraAttributes([
                    'class' => 'cursor-pointer',
                    'wire:click' => '$emitUp("setStatusFilter", "processed")',
                ]),
        ];
    }
}
