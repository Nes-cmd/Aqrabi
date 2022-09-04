<?php

namespace App\Filament\Resources\UserResource\Widgets;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use HtmlSanitizer\Extension\Details\Node\SummaryNode;
use App\Helper\DashboardDataFecher;

class StatsOverview extends BaseWidget
{
    public static function canView(): bool
    {
        return 1;
    }
    protected function getCards(): array
    {
        $dashboardDataFecher = new DashboardDataFecher();
        $userId = auth()->user()->id;
        if (auth()->user()->hasVerifiedRole('adjhmin')) {
            //////////////////////  Customers trend //////////////////////////////////////////////////////////////////
            $customerTrend = $dashboardDataFecher->totalCustomerTrend();
            $customers = Card::make('Total Customers', $customerTrend['total_customers'])
                ->description($customerTrend['new_customers']. ' increase')
                ->descriptionIcon('heroicon-s-trending-up')
                ->chart($customerTrend['monthly_data'])
                ->color('success');
            ///////////////////////  Orders trend   /////////////////////////////////////////////////////////////////////
            $orderTrend = $dashboardDataFecher->totalOrderTrend();
            $orders = Card::make('Total orders', $orderTrend['total_orders'])
                            ->description($orderTrend['new_orders'].' increase')
                            ->descriptionIcon('heroicon-s-trending-up')
                            ->chart($orderTrend['monthly_data'])
                            ->color('danger');
            ///////////////////////  Suppliers trend   /////////////////////////////////////////////////////////////////////
            $supplierTrend = $dashboardDataFecher->totalSupplierTrend();
            $suppliers = Card::make('Total Customers', $supplierTrend['total_suppliers'])
                ->chart($supplierTrend['monthly_data'])
                ->color('primary');
            ///////////////////////  Products trend   /////////////////////////////////////////////////////////////////////
            $productTrend = $dashboardDataFecher->totatProductTrend();
            $products = Card::make('Total products', $productTrend['total_products'])
                ->chart($productTrend['monthly_data'])
                ->color('primary');
            /////////////////////////////////////////////////////////////////////////////////////////////////////////////
            return [
                $customers,
                $orders,
                $suppliers,
                $products
            ];
        }
        ///////////////////////////////////  Trend of customers of supplier  /////////////////////////////////////////////////////
        $myCustomersTrend = $dashboardDataFecher->supplierCustomersTrend();
        $myCustomers = Card::make('Total customers', $myCustomersTrend['total_customers'])
                            ->descriptionIcon('heroicon-o-user')
                            ->description('Customers')
                            ->color('success')
                            ->chart($myCustomersTrend['monthly_data']);
        ///////////////////////////////////  Trend of Orders of supplier  /////////////////////////////////////////////////////
        $mySuppliersTrend = $dashboardDataFecher->supplierOrderTrend();
        $myOrders = Card::make('Your orders', $mySuppliersTrend['total_orders'])
                            ->color('danger')
                            ->description('Orders from customers')
                            ->descriptionIcon('heroicon-s-trending-up')
                            ->chart($mySuppliersTrend['monthly_data']);
        ///////////////////////////////////  Trend of Orders of supplier  /////////////////////////////////////////////////////
        $myProductsTrend = $dashboardDataFecher->supplierProductTrend();
        $products = Card::make('Total products', $myProductsTrend['total_products'])
                                ->color('primary')
                                ->description('Your products')
                                ->chart($myProductsTrend['monthly_data']);
        /////////////////////////////////////////////////////////////////////////////////////////////////////////////
        return [
            $myCustomers,
            $myOrders,
            $products,
        ];

        // Card::make('Processed', '192.1k')
        //     ->color('success')
        //     ->extraAttributes([
        //         'class' => 'cursor-pointer',
        //         'wire:click' => '$emitUp("setStatusFilter", "processed")',
        //     ]),
    }
}
