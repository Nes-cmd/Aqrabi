<?php

namespace App\Http\Livewire\Blocks;

use Livewire\Component;
use App\Models\Product;
class CollectionsSlide extends Component
{
    public $values = [];
    public function mount($type = null)
    {
        if ($type == 'top-collections') {
            $this->values = Product::all()->take(4);
            $this->title = 'TOP COLLECTIONS';
        }
    }
    public function render()
    {
        $values = $this->values;
        return view('livewire.blocks.collections-slide', compact('values'));
    }
}
