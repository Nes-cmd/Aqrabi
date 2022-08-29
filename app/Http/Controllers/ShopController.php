<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Slider;
use DB;
class ShopController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        return view('customer.index', compact('sliders'));
    }
    public function test()
    {
        return '<h1 style="text-center">On development</h1>';
    }
}
