<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Cart extends Component
{
    protected $listeners = ['toCart', 'cartSize'];
    public $cart_size;
    public $cart;
    public function mount()
    {
        $this->cartSize();   
        session()->has('cart')?$this->cart = session()->get('cart'):$this->cart = collect();      
    }
    public function cartSize()
    {
        $this->cart_size = session()->has('cart')?sizeof(session()->get('cart')):0;
    }
    public function toCart($id, $specific = null)
    {

        if(session()->has('cart'))$cart = session()->get('cart');
        else $cart = collect();

        $product = \DB::table('products')->where('id', $id)->first();
        // $photo = \DB::table('product_photos')->where('product_id', $id)->first();
        $product = (array)$product;
        $specific==null?$product['quantity'] = 1:$product['quantity'] = $specific['quantity'];
        $product['promo_discount'] = 0;
        // $product['path'] = $photo->path;
        if($cart->has($id)){
            $x = $cart[$id];
            $x['quantity'] = $x['quantity'] + 1; 
            $cart[$id] = $x;
        }
        else{
            $cart[$id] =  $product;
        }
        session()->put('cart', $cart);
        $this->cart = $cart;
        $this->cartSize(); 
    }
    public function remove($id)
    {
        $this->cart->forget($id);
        session()->put('cart', $this->cart);
        $this->cartSize();
        $this->render();
    }
    public function render()
    {
        return view('livewire.cart')->with('carts', $this->cart);
    }
}
