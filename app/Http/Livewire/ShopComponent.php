<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class ShopComponent extends Component
{
    public $viewType = 'list';
    protected $products;
    public $categories;
    public function mount()
    {
        $this->products = Product::paginate(5);
        $this->categories = Category::all();
    }
    public function render()
    {
        $products = $this->products;
        $categories = $this->categories;
        return view('livewire.shop-component', compact('products', 'categories'))
                    ->layout('layouts.customer.app');
    }
}
