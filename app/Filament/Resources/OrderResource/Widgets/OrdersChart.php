<?php

namespace App\Filament\Resources\OrderResource\Widgets;

use Filament\Widgets\LineChartWidget;

class OrdersChart extends LineChartWidget
{
    protected static ?string $heading = 'Chart';
    
    protected function getData(): array
    {
        
        return [
            'datasets' => [
                [
                    'label' => 'Order from customer',
                    'data' => [5, 10, 5, 2, 21, 32, 45, 74, 65, 45, 77, 89],
                ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        ];
    }
}
