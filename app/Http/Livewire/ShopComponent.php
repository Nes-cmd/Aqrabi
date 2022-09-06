<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use App\Models\Wishlist;
use Livewire\Component;

class ShopComponent extends Component
{
    public $query;
    public $categoryFilterId = null;
    public function mount($query = '%')
    {
        $this->query = $query;
    }
    public function categoryFilter($id)
    {
        $this->categoryFilterId = $id;
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
        if($this->categoryFilterId){
            $products = Product::where('category_id',$this->categoryFilterId)->where('count', '>', 0)->paginate(10);
        }
        else{
            $products = Product::where('productname', 'like', '%'.$this->query.'%')->where('count', '>', 0)->paginate(10);
        }
        $categories =  Category::all();
        return view('livewire.shop-component', compact('products', 'categories'))
                    ->layout('layouts.customer.app');
    }
}
