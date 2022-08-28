<?php

namespace App\Http\Livewire\Blocks;

use Livewire\Component;
use App\Models\Product;
class Collections extends Component
{
    public $values = [];
    public $title;
    public function mount($type = null)
    {
        if ($type == 'top-products') {
            $this->values = Product::all()->take(4);
            $this->title = 'TOP PRODUCTS';
        }
    }
    public function render()
    {
        $values = $this->values;
        return view('livewire.blocks.collections', compact('values'));
    }
}
