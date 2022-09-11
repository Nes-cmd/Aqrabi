<?php

namespace App\Http\Livewire\Blocks;

use App\Http\Livewire\Wishlist;
use Livewire\Component;
use App\Models\Product;
class CollectionsSlide extends Component
{
    public $values = [];
    public function mount($type = null)
    {
        if ($type == 'top-collections') {
            $this->values = Product::all()->take(6);
            $this->title = 'TOP COLLECTIONS';
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
        return view('livewire.blocks.collections-slide', compact('values'));
    }
}
