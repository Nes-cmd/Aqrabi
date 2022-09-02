<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
class SearchComponent extends Component
{
    public $query;
    public $suggestions = [];
    public function updatedQuery()
    {
        $this->suggestions = \DB::table('products')->where('productname', 'like', '%'.$this->query.'%')->select('id','productname')->get()->take(5);
    }
    public function search()
    {
        return redirect('shop/search/'.$this->query);
    }
    public function render()
    {
        return view('livewire.search-component');
    }
}
