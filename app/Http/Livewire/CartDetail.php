<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\Cart;

class CartDetail extends Component
{
    use LivewireAlert;
    public $carts;
    protected $rules = ['carts.*.quantity' => 'required'];
    public function mount()
    {
        if(auth()->user()){
            $this->updateCart();
        }
    }
    public function removeCart($id)
    {
        Cart::where('id', $id)->delete();
        $this->updateCart();
        $this->emit('cartSize');
        $this->alert('info', 'Item removed', ['position' => 'top-end']);
    }
    public function decrement($id)
    {
        $cart = Cart::where('id', $id)->first();
        if($cart->quantity > 1){
            $cart->quantity = $cart->quantity - 1;
            $cart->save();
            $this->updateCart();
        }
    }
    public function updated($carts)
    {
        foreach($this->carts as $cart){
            if($cart->quantity < 1 ){
                $cart->quantity = 1;
            }
            $cart->save();
        }
    }
    public function increment($id)
    {
        $cart = Cart::where('id', $id)->first();
        $cart->quantity = $cart->quantity + 1;
        $cart->save();
        $this->updateCart();
    }
    public function updateCart()
    {
        $this->carts = Cart::with('product')->where('user_id', auth()->user()->id)->get();
        
    }
    public function render()
    {
        $carts = $this->carts;
        return view('livewire.cart-detail', compact('carts'))
                        ->layout('layouts.customer.app');
    }
}
