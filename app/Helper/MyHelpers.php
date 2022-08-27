<?php
use App\Models\Cart;
function cartTotal()
{
    $carts = Cart::with('product')->where('user_id', auth()->user()->id)->get();
    $total = ['discounted' => 0, 'total' => 0];
    foreach($carts as $cart){
        $total['discounted'] =  $total['discounted'] + $cart->quantity* ($cart->product->price - $cart->product->discount);
        $total['total'] =  $total['total'] + $cart->quantity* ($cart->product->price);
    }
    return $total;
}