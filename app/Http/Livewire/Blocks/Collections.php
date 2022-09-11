<?php

namespace App\Http\Livewire\Blocks;

use App\Http\Livewire\Wishlist;
use Livewire\Component;
use App\Models\Product;
class Collections extends Component
{
    public $values = [];
    public $title;
    public function mount($type = null)
    {
        if ($type == 'top-products') {
            $this->values = Product::all();
            $this->title = 'TOP PRODUCTS';
        }
    }
    public function wishlist($id)
    {
        if(!auth()->check()){
            return redirect('login');
        }
        Wishlist::create([
            'user_id' => auth()->user()->id,
            'product_id' => $id,
        ]);
        $this->alert('success', 'Item added to wish-list', [
            'toast' => true,
            'position' => 'top-end',
        ]);
    }
    public function render()
    {
        $values = $this->values;
        return view('livewire.blocks.collections', compact('values'));
    }
}
