<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerDashboardController extends Controller
{
    public function dashboard()
    {
        $this->middleware('auth');
        return view('customer.dashboard');
    }
    public function profile()
    {
        return view('customer.profile');
    }
    public function orders()
    {
        return view('customer.order');
    }
    public function address()
    {
        return view('customer.address');
    }
}
