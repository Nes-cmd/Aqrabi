<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Wishlist as MyWishlist;

class Wishlist extends Component
{
    public $wishlists;
    public function mount()
    {
        $this->wishlists = MyWishlist::with('product')->where('user_id', auth()->user()->id)->get();
    }
    public function removeWishlist($id)
    {
        MyWishlist::where('id', $id)->delete();
        $this->wishlists = MyWishlist::with('product')->where('user_id', auth()->user()->id)->get();
        $this->render();
    }
    public function render()
    {
        $wishlists = $this->wishlists;
        return view('livewire.wishlist', compact('wishlists'))
                        ->layout('layouts.customer.app');
    }
}
