<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Address;
use Illuminate\Http\Request;

class CustomerDashboardController extends Controller
{
    public function dashboard()
    {
        $orders = Order::where('user_id', auth()->id())->get();
        return view('customer.dashboard', compact('orders'));
    }
    public function profile()
    {
        $user = auth()->user();
        return view('customer.profile', compact('user'));
    }
    public function orders()
    {
        $orders = Order::with('orderDetails','orderDetails.product')->where('user_id', auth()->id())->get();
        // dd($orders);
        return view('customer.order', compact('orders'));
    }
    public function address()
    {
        $adresses = Address::with('country')->where('user_id', auth()->id())->get();
        dd($adresses);
        return view('customer.address', compact('adresses'));
    }
}
