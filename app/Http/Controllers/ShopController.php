<?php

namespace App\Http\Controllers;
use App\Models\Slider;

class ShopController extends Controller
{
    public function index()
    {
        // $alert = ['title' => 'Title goes here', 'position' => 'center', 'showConfirmButton' => true,'icon' => 'danger', 'timer' => 3000];
        // session()->flash('alert', $alert);
        $sliders = Slider::all();
        return view('customer.index', compact('sliders'));
    }
    public function test()
    {
        return '<h1 style="text-center">On development</h1>';
    }
    public function orderSuccess($id)
    {
        return view('customer.order-success')->with(['orderId' => $id]);
    }
}
