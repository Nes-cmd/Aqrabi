<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Wishlist as MyWishlist;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Wishlist extends Component
{
    use LivewireAlert;
    public $wishlists;
    protected $listeners  = ['toWishlist'];
    public function mount()
    {
        $this->wishlists = MyWishlist::with('product')->where('user_id', auth()->user()->id)->get();
    }
    public function removeWishlist($id)
    {
        MyWishlist::where('id', $id)->delete();
        $this->wishlists = MyWishlist::with('product')->where('user_id', auth()->user()->id)->get();
        
        $this->alert('info', 'Item removed', [
            'toast' => true,
            'position' => 'top-end',
        ]);
        $this->render();
    }
    public function toWishlist($id)
    {
        dd('here');
        if(! auth()->check()){
            return redirect('/login');
        }
        Wishlist::create([
            'user_id' => auth()->user()->id,
            'product_id' => $id,
        ]);
        $this->alert('success', 'Item added to wish-list', [
            'toast' => true,
            'position' => 'top-end',
        ]);
        $this->alert('success', 'Added to wishlist');
    }
    public function render()
    {
        $wishlists = $this->wishlists;
        return view('livewire.wishlist', compact('wishlists'))
                        ->layout('layouts.customer.app');
    }
}
