<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class SingleProduct extends Component
{
    public $product;
    public $quantity = 1;
    public function mount($id)
    {
        $this->product = Product::where('id', $id)->first();
    }
    public function toCart()
    {
        $this->emit('toCart', $this->product->id, $this->quantity);
    }
    public function render()
    {
        return view('livewire.single-product')
                        ->layout('layouts.customer.app');
    }
}
