<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class SingleProduct extends Component
{
    public $product;
    public function mount($id)
    {
        $this->product = Product::where('id', $id)->first();
        // dd($this->product);
    }
    public function render()
    {
        return view('livewire.single-product')
                        ->layout('layouts.customer.app');
    }
}
