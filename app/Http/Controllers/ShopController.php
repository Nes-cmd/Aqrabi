<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\User;


class ShopController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        // session()->flush();
        // session()->save();
        // dd(session()->all());
        return view('customer.index', compact('sliders'));
    }
    public function test()
    {
        return '<h1 style="text-center">On development</h1>';
    }
}
