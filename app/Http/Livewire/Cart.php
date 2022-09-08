<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cart as MyCart;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Cart extends Component
{
    use LivewireAlert;
    protected $listeners = ['toCart', 'cartSize','alertFired'];
    public $cart_size;
    public $cart = [];
    public function mount()
    {
        if(auth()->user()){
            $this->updateCart();
        }
    }
    public function alertFired()
    {
        $this->alert('success', 'Item added to cart', [
            'toast' => true,
            'position' => 'top-end',
        ]);
    }
    public function cartSize()
    {
        $this->cart_size = count($this->cart);
    }
    public function toCart($id, $quantity = 1, $specific = null)
    {
        if(auth()->user()){
            MyCart::create([
                'user_id' => auth()->user()->id,
                'product_id' => $id,
                'specifications' => $specific,
                'quantity' => $quantity
            ]);
            $this->updateCart();
            $this->alert('success', 'Item added to cart', [
                'toast' => true,
                'position' => 'top-end',
            ]);
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
        $this->alert('info', 'Item removed', ['position' => 'top-end']);
    }
    public function render()
    {
        return view('livewire.cart')->with('carts', $this->cart);
    }
}
