<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\DashboardDataFecher;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\Slider;
use App\Models\User;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $dataFetch =  new DashboardDataFecher();
        $data['total_customers_trend'] = $dataFetch->totalCustomerTrend();
        $data['total_orders_trend'] = $dataFetch->totalOrderTrend();
        $data['total_suppliers_trend'] = $dataFetch->totalSupplierTrend();
        $data['total_products_trend'] = $dataFetch->totatProductTrend();
        return $data;
    }
    public function product()
    {
        $product = Product::all();
        return ['products' => $product];
    }
    public function order()
    {
        $orders = Order::with('OrderDetails')->all();
        return ['orders' => $orders];
    }
    public function slider()
    {
        $sliders = Slider::all();
        return ['sliders' => $sliders];
    }
    public function category()
    {
        $category = Category::all();
        return ['categories' => $category];
    }
    public function user()
    {
        $users = User::all();
        return ['users' => $users];
    }
}
