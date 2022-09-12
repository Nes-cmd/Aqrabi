<?php

namespace App\Http\Controllers;

use App\Helper\ProductFilters;
use App\Models\Product;
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
        $filters = new ProductFilters();
        $filters->userInputs = ['category_id' => null];
        // dd($filters);

        dd(Product::filter($filters)->get());
    }
    public function orderSuccess($id)
    {
        return view('customer.order-success')->with(['orderId' => $id]);
    }
}
