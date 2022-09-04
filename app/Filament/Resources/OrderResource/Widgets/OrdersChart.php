<?php

namespace App\Filament\Resources\OrderResource\Widgets;

use App\Helper\DashboardDataFecher;
use Filament\Widgets\LineChartWidget;
use App\Models\Order;
use App\Models\OrderDetail;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class OrdersChart extends LineChartWidget
{
    protected static ?string $heading = 'Orders';
    
    // public static function canView(): bool
    // {
    //     return auth()->user()->hasRole('admin'); 
    // }
    protected function getData(): array
    {
        $dashboardFecher = new DashboardDataFecher();
        // $order = Order::all()->map(function($raw){
        //     $x = substr($raw->created_at, 0,10);
        //     $raw['created_month'] = $x;
        //     return $raw;
        // })->groupBy('created_month');
        
        // $data = [];
        // $month = [];
        // foreach ($order as $key => $child) {
        //     array_push($data, count($child));
        //     array_push($month, $key);
        // }
        // $data[3] = 4;
        // $month[3] = '333';

        // return [
        //     'datasets' => [
        //         [
        //             'label' => 'Order from customer',
        //             'data' => $data,
        //         ],
        //     ],
        //     'labels' => $month,
        //     // 'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        // ];
        if(auth()->user()->hasVerifiedRole('admin')){
            $orderTrend = $dashboardFecher->totalOrderTrend();
        }
        else{
            $orderTrend = $dashboardFecher->supplierOrderTrend();
        }
        
        return [
            'datasets' => [
                [
                    'label' => 'Orders',
                    'data' => $orderTrend['monthly_data'],
                    'backgroundColor' => [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    'borderColor' => [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    'borderWidth' => 2
                ],
            ],
            'labels' => $orderTrend['label'],
        ];
    }
}
