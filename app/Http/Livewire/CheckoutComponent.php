<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use Faker\Core\Uuid;

class CheckoutComponent extends Component
{
    protected $listeners = ['shippmentAdded', 'pageSelector', 'placeOrder'];

    public $page = 'shippment';
    public $shippmentAdress = null;

    
    public function shippmentAdded($adress)
    {
        $this->shippmentAdress = $adress;
        $this->pageSelector('review');
    }
    public function placeOrder()
    {
        $carts = Cart::where('user_id', auth()->user()->id)->get();
        $order = Order::create([
            'user_id' => auth()->user()->id,
            'orderId' => strtoupper(uniqid()),
            'shippment_adress_id' => $this->shippmentAdress['id'],
        ]);
        foreach($carts as $cart){
            OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $cart->product_id,
                'quantity' => $cart->quantity,
                'specifications' => $cart->specifications
            ]);
            $cart->delete();
        }
        return redirect('/shop/order-success/'.$order->orderId);
    }
    public function pageSelector($page)
    {
        $this->page = $page;
    }
    public function render()
    {
        return view('livewire.checkout-component')
                    ->layout('layouts.customer.app');
    }
}