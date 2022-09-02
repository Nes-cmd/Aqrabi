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

class StatsOverview extends BaseWidget
{
    public static function canView(): bool
    {
        return 1;
    }
    protected function getCards(): array
    {
        $userId = auth()->user()->id;
        if (auth()->user()->hasVerifiedRole('admin')) {
            //////////////////////  Customers trend //////////////////////////////////////////////////////////////////
            $totalCustomer = Trend::model(User::class)
                ->between(
                    start: now()->startOfYear(),
                    end: now()->endOfYear(),
                )
                ->perMonth()
                ->count();
            $array_value = $totalCustomer->map(fn (TrendValue $value) => $value->aggregate)->toArray();
            $customers = Card::make('Total Customers', array_sum($array_value))
                ->description(array_sum($array_value) . ' increase')
                ->descriptionIcon('heroicon-s-trending-up')
                ->chart($array_value)
                ->color('success');
            ///////////////////////  Orders trend   /////////////////////////////////////////////////////////////////////
            $totalOrder = Trend::model(Order::class)
                ->between(
                    start: now()->startOfYear(),
                    end: now()->endOfYear(),
                )
                ->perMonth()
                ->count();
            $array_value = $totalOrder->map(fn (TrendValue $value) => $value->aggregate)->toArray();
            $orders = Card::make('Total orders', array_sum($array_value))
                            ->description(array_sum($array_value).' increase')
                            ->descriptionIcon('heroicon-s-trending-up')
                            ->chart($array_value)
                            ->color('danger');
            ///////////////////////  Suppliers trend   /////////////////////////////////////////////////////////////////////
            $supplierQuery = User::whereHas('roles', function ($query) {
                                    $query->where('slug', 'supplier');
                                });
            $total = $supplierQuery->count();
            $totalSupplier = Trend::query($supplierQuery)
                ->between(
                    start: now()->startOfYear(),
                    end: now()->endOfYear(),
                )
                ->perMonth()
                ->count();
            $array_value = $totalSupplier->map(fn (TrendValue $value) => $value->aggregate)->toArray();
            $suppliers = Card::make('Total Customers', $total)
                ->chart($array_value)
                ->color('primary');
            ///////////////////////  Products trend   /////////////////////////////////////////////////////////////////////
            $totalProduct = Trend::model(Product::class)
                ->between(
                    start: now()->startOfYear(),
                    end: now()->endOfYear(),
                )
                ->perMonth()
                ->count();
            $array_value = $totalProduct->map(fn (TrendValue $value) => $value->aggregate)->toArray();
            $suppliers = Card::make('Total products', Product::all()->count())
                ->chart($array_value)
                ->color('primary');
            /////////////////////////////////////////////////////////////////////////////////////////////////////////////

            return [
                $customers,
                $orders,
                $suppliers
            ];
        }
        ///////////////////////////////////  Trend of customers of supplier  /////////////////////////////////////////////////////
        $customerQuery = Order::with(['OrderDetails' => function($query){
                                $query->where('supplier_id', auth()->user()->id);
                            }])
                            ->distinct('user_id');
        $totalOrderCount = $customerQuery->count();
        $totalCustomer = Trend::query($customerQuery)
                                ->between(
                                    start: now()->startOfYear(),
                                    end : now()->endOfYear() 
                                )
                                ->perMonth()
                                ->count();
        $array_value = $totalCustomer->map(fn (TrendValue $value) => $value->aggregate)->toArray();
        $myCustomers = Card::make('Total customers', $totalOrderCount)
                            ->descriptionIcon('heroicon-o-user')
                            ->description('Customers')
                            ->color('success')
                            ->chart($array_value);
        ///////////////////////////////////  Trend of Orders of supplier  /////////////////////////////////////////////////////
        $orderQuery = OrderDetail::where('supplier_id', $userId)->distinct();
        $totalOrder = $orderQuery->count();
        $trend = Trend::query($orderQuery)
                        ->between(
                            start: now()->startOfYear(),
                            end  : now()->endOfYear()
                        )
                        ->perMonth()
                        ->count();
        $array_value = $trend->map(fn(TrendValue $value) => $value->aggregate)->toArray();
        $myOrders = Card::make('Your orders', $totalOrder)
                            ->color('danger')
                            ->description('Orders from customers')
                            ->descriptionIcon('heroicon-s-trending-up')
                            ->chart($array_value);
        ///////////////////////////////////  Trend of Orders of supplier  /////////////////////////////////////////////////////
        $productQuery = Product::where('supplier_id', $userId);
        $totalProducts = $productQuery->count();
        $trend = Trend::query($productQuery)
                            ->between(
                                start: now()->startOfYear(),
                                end  : now()->endOfYear()
                            )
                            ->perMonth()
                            ->count();
        $array_value = $trend->map(fn(TrendValue $value) => $value->aggregate)->toArray();
        $array_value[3] = 4;
        $array_value[4] = 6;
        $products = Card::make('Total products', $totalProducts)
                                ->color('primary')
                                ->description('Your products')
                                ->chart($array_value);
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
