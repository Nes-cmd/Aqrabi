<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cart as MyCart;

class Cart extends Component
{
    protected $listeners = ['toCart', 'cartSize'];
    public $cart_size;
    public $cart = [];
    public function mount()
    {

        if(auth()->user()){
            $this->updateCart();
        }
    }
    public function cartSize()
    {
        $this->cart_size = count($this->cart);
    }
    public function toCart($id, $specific = null)
    {
        if(auth()->user()){
            MyCart::create([
                'user_id' => auth()->user()->id,
                'product_id' => $id,
                'specifications' => $specific
            ]);
            $this->updateCart();
        }
        else{
            return redirect('/login');
        }
    }
    public function updateCart()
    {
        $this->cart = MyCart::with('product')->where('user_id', auth()->user()->id)->get();
        $this->cartSize();
    }
    public function remove($id)
    {
        MyCart::where('id', $id)->delete();
        $this->updateCart();
        $this->render();
    }
    public function render()
    {
        return view('livewire.cart')->with('carts', $this->cart);
    }
}
