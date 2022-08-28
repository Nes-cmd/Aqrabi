<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use Livewire\Component;

class ReviewComponent extends Component
{
    public $carts;
    public $shippmentAdress;
    public function mount($shippmentAdress = null)
    {
        $this->carts = Cart::with('product')->where('user_id', auth()->user()->id)->get();  
        $this->shippmentAdress = $shippmentAdress;
    }
    public function render()
    {
        $shippmentAdress = $this->shippmentAdress;
        return view('livewire.review-component', compact('shippmentAdress'));
    }
}
