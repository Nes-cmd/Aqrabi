<?php
namespace App\Helper;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class DashboardDataFecher
{
    public function totalCustomerTrend()
    {
        $trend = Trend::model(User::class)
                ->between(
                    start: now()->startOfYear(),
                    end: now()->endOfYear(),
                )
                ->perMonth()
                ->count();
        $data = $trend->map(fn (TrendValue $value) => $value->aggregate)->toArray();
        $label = $trend->map(fn (TrendValue $value) => $value->date)->toArray();
        $totalCustomer = User::all()->count();
        return ['total_customers' => $totalCustomer, 'monthly_data' => $data, 'label' => $label, 'new_customers' => array_sum($data)];
    }
    public function totalOrderTrend()
    {
        $trend = Trend::model(Order::class)
                ->between(
                    start: now()->startOfYear(),
                    end: now()->endOfYear(),
                )
                ->perMonth()
                ->count();
        $data = $trend->map(fn (TrendValue $value) => $value->aggregate)->toArray();
        $label = $trend->map(fn (TrendValue $value) => $value->date)->toArray();
        $totalOrders = Order::all()->count();
        return ['total_orders' => $totalOrders, 'monthly_data' => $data, 'label' => $label, 'new_orders' => array_sum($data)];
    }

    public function totalSupplierTrend()
    {
        $supplierQuery = User::whereHas('roles', function ($query) {
                                $query->where('slug', 'supplier');
                            });
        $total = $supplierQuery->count();
        $supplierTrend = Trend::query($supplierQuery)
                            ->between(
                            start: now()->startOfYear(),
                            end: now()->endOfYear(),
                            )
                            ->perMonth()
                            ->count();
        $data = $supplierTrend->map(fn (TrendValue $value) => $value->aggregate)->toArray();
        $label = $supplierTrend->map(fn(TrendValue $value) => $value->date)->toArray();
        return ['total_suppliers' => $total, 'monthly_data' => $data, 'label' => $label, 'new_suppliers' => array_sum($data)];
    }

    public function totatProductTrend()
    {
        $productTrend = Trend::model(Product::class)
                ->between(
                    start: now()->startOfYear(),
                    end: now()->endOfYear(),
                )
                ->perMonth()
                ->count();
        $data = $productTrend->map(fn (TrendValue $value) => $value->aggregate)->toArray();
        $label = $productTrend->map(fn (TrendValue $value) => $value->date)->toArray();
        $totalProduct = Product::all()->count();
        return ['total_products' => $totalProduct, 'monthly_data' => $data, 'label' => $label, 'new_products' => array_sum($data)];
    }
    //////////////////////////// Suppliers  ///////////////////////////////////////////////////////////////////////
    public function supplierCustomersTrend()
    {
        $customerQuery = Order::with(['OrderDetails' => function($query){
                    $query->where('supplier_id', auth()->user()->id);
                }])
                ->distinct('user_id');
        $totalOrderCount = $customerQuery->count();
        $customerTrend = Trend::query($customerQuery)
                    ->between(
                        start: now()->startOfYear(),
                        end : now()->endOfYear() 
                    )
                    ->perMonth()
                    ->count();
        $data = $customerTrend->map(fn (TrendValue $value) => $value->aggregate)->toArray();
        $label = $customerTrend->map(fn (TrendValue $value) => $value->date)->toArray();
        return ['total_customers' => $totalOrderCount, 'monthly_data' => $data, 'label' => $label, 'new_customers' => array_sum($data)];
    }

    public function supplierOrderTrend()
    {
        $orderQuery = OrderDetail::where('supplier_id', auth()->id())->distinct();
        $totalOrder = $orderQuery->count();
        $orderTrend = Trend::query($orderQuery)
                        ->between(
                            start: now()->startOfMonth(),
                            end  : now()->endOfMonth()
                        )
                        ->perDay()
                        ->count();
        $data = $orderTrend->map(fn(TrendValue $value) => $value->aggregate)->toArray();
        $label = $orderTrend->map(fn(TrendValue $value) => $value->date)->toArray();
        return ['total_orders' => $totalOrder, 'monthly_data' => $data, 'label' => $label, 'new_order' => array_sum($data)];
    }
    
    public function supplierProductTrend()
    {
        $productQuery = Product::where('supplier_id', auth()->id());
        $totalProducts = $productQuery->count();
        $productTrend = Trend::query($productQuery)
                            ->between(
                                start: now()->startOfYear(),
                                end  : now()->endOfYear()
                            )
                            ->perMonth()
                            ->count();
        $data = $productTrend->map(fn(TrendValue $value) => $value->aggregate)->toArray();
        $label = $productTrend->map(fn(TrendValue $value) => $value->date)->toArray();
        return ['total_products' => $totalProducts, 'monthly_data' => $data, 'label' => $label, 'new_products' => array_sum($data)];
    }
}