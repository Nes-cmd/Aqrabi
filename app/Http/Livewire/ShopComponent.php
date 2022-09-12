<?php

namespace App\Http\Livewire;

use App\Helper\ProductFilters;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Wishlist;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ShopComponent extends Component
{
    use LivewireAlert;

    public $myFilters = ['category_id' => null,'supplier_id' => null, 'price' => null];
    public $price_filter = ['priceMin' => '2500','priceMax' => '50000'];
    public function mount($query = '%')
    {
        $this->myFilters['name'] = $query;
    }
    public function categoryFilter($id)
    {
        $this->myFilters['category_id'] = $id;
    }
    public function priceFilter()
    {
        // dd($this->price_filter);
        $this->myFilters['price'] = $this->price_filter;
    }
    public function supplierFilter($id)
    {
        $this->myFilters['supplier_id'] = $id;
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
    public function render(ProductFilters $filtersClass)
    {
        $filtersClass->userInputs = $this->myFilters;
        $products = Product::filter($filtersClass)->paginate(20);
        $categories =  Category::all();
        $suppliers = User::whereHas('roles', function($query){
            $query->where('slug', 'supplier');
        })->get();
        return view('livewire.shop-component', compact('products', 'categories','suppliers'))
                    ->layout('layouts.customer.app');
    }
}