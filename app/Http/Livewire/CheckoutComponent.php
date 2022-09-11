<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cart;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;

class CheckoutComponent extends Component
{
    use LivewireAlert;
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
        $carts = Cart::with('product')->where('user_id', auth()->user()->id)->get();
        $totalPrice = 0;
        $totalItems = 0;
        $order = Order::create([
            'user_id' => auth()->user()->id,
            'orderId' => strtoupper(uniqid()),
            'address_id' => $this->shippmentAdress['id'],
            'total_item' => $totalItems,
            'total_price' => $totalPrice,
        ]);
        foreach($carts as $cart){
            OrderDetail::create([
                'order_id' => $order->id,
                'supplier_id' => $cart->product->supplier_id,
                'product_id' => $cart->product_id,
                'quantity' => $cart->quantity,
                'specifications' => $cart->specifications
            ]);
            $product = Product::where('id', $cart->product_id)->first();
            $product->count = $product->count - $cart->quantity;
            $product->ordered_counter = $product->ordered_counter + $cart->quantity;
            $product->save();
            $cart->delete();
            $totalPrice = $totalPrice + $cart->quantity * $product->price;
            $totalItems = $totalItems + $cart->quantity;
        }
        $order['total_item'] = $totalItems;
        $order['total_price'] = $totalPrice;
        $order->save();
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