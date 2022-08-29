<?php

namespace App\Filament\Resources\OrderResource\Widgets;

use Filament\Widgets\LineChartWidget;
use App\Models\Order;

class OrdersChart extends LineChartWidget
{
    protected static ?string $heading = 'Chart';
    
    protected function getData(): array
    {
        $order = Order::all()->map(function($raw){
            $x = substr($raw->created_at, 0,10);
            $raw['created_month'] = $x;
            return $raw;
        })->groupBy('created_month');
        
        $data = [];
        $month = [];
        foreach ($order as $key => $child) {
            array_push($data, count($child));
            array_push($month, $key);
        }

        return [
            'datasets' => [
                [
                    'label' => 'Order from customer',
                    'data' => $data,
                ],
            ],
            'labels' => $month,
            // 'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        ];
    }
}
