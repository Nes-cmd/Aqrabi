<?php

use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Livewire\CartDetail;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use App\Http\Livewire\SingleProduct;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\Wishlist;

Route::get('shop/single-product/{id}', SingleProduct::class)->name('shop.single-product');
Route::get('shop/producs', ShopComponent::class)->name('shop.list');

Route::middleware('auth')->get('shop/cart-detail', CartDetail::class)->name('shop.cart-detail');
Route::middleware('auth')->get('shop/checkout', CheckoutComponent::class)->name('shop.checkout');
Route::middleware('auth')->get('shop/wishlist', Wishlist::class)->name('shop.wishlist');

Route::view('shop/contact', 'customer.contact')->name('shop.contact');
Route::get('/shop/order-success/{id}', function ($id)
{
    return view('customer.order-success')->with(['orderId' => $id]);
});

Route::get('/', [ShopController::class, 'index'])->name('shop.index');
// Route::get('supplier/login', function(){return view('auth.supplier-login');});
// Route::post('/supplier/login', [AuthenticatedSessionController::class, 'store'])->name('supplier-login');