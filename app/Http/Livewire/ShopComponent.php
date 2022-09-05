<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use App\Models\Wishlist;
use Livewire\Component;

class ShopComponent extends Component
{
    public $query;
    public function mount($query = '%')
    {
        $this->query = $query;
    }
    public function wishlist($id)
    {
        Wishlist::create([
            'user_id' => auth()->user()->id,
            'product_id' => $id,
        ]);
    }
    public function render()
    {
        $products = Product::where('productname', 'like', '%'.$this->query.'%')->where('count', '>', 0)->paginate(5);
        $categories =  Category::all();
        return view('livewire.shop-component', compact('products', 'categories'))
                    ->layout('layouts.customer.app');
    }
}
