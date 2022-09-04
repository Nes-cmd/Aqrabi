<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\DashboardDataFecher;
use App\Models\Order;

class SupplierDashboardController extends Controller
{
    public function index()
    {
        $dataFetch =  new DashboardDataFecher();
        $data['supplier_customers_trend'] = $dataFetch->supplierCustomersTrend();
        $data['supplier_orders_trend'] = $dataFetch->supplierOrderTrend();
        $data['supplier_products_trend'] = $dataFetch->supplierProductTrend();
        return $data;
    }
    public function order()
    {
        $orders = Order::with(['ordersDetail' => function($query){
            $query->where('supplier_id', auth()->id());
        }])->get();
        return ['orders' => $orders];
    }
    public function customer()
    {
        $customers = \DB::table('users')
                            ->join('orders', 'users.id','=','orders.user_id')
                            ->join('order_details','orders.id','=', 'order_details.order_id' )
                            ->where('order_details.supplier_id', auth()->id())
                            ->distinct()
                            ->select('users.id','users.fullname','users.phone','users.email','users.tin_number')
                            ->get();
        return ['customers' => $customers];
    }
}
