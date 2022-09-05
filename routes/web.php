<?php

use App\Http\Controllers\Auth\PhoneVerificationController;
use App\Http\Controllers\CustomerDashboardController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Livewire\CartDetail;
use App\Http\Livewire\SingleProduct;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\Wishlist;

Route::get('shop/single-product/{id}', SingleProduct::class)->name('shop.single-product');
Route::get('shop/producs', ShopComponent::class)->name('shop.list');
Route::get('shop/search/{query?}', ShopComponent::class)->name('shop.search');

Route::middleware('auth')->get('shop/cart-detail', CartDetail::class)->name('shop.cart-detail');
Route::middleware('auth')->get('shop/checkout', CheckoutComponent::class)->name('shop.checkout');
Route::middleware('auth')->get('shop/wishlist', Wishlist::class)->name('shop.wishlist');

Route::view('shop/contact', 'customer.contact')->name('shop.contact');
Route::get('/shop/order-success/{id}', function ($id)
{
    return view('customer.order-success')->with(['orderId' => $id]);
});

Route::get('test', [ShopController::class, 'index'])->name('shop.index');

Route::view('/choose-acccount-type','customer.choose-user')->name('choose-acccount-type');
Route::get('/', [ShopController::class, 'test'])->name('shop.index');

Route::get('customer/dashboard', [CustomerDashboardController::class, 'dashboard'])->name('customer.dashboard');
Route::get('customer/orders', [CustomerDashboardController::class, 'orders'])->name('customer.orders');
Route::get('customer/address', [CustomerDashboardController::class, 'address'])->name('customer.address');
Route::get('customer/profile', [CustomerDashboardController::class, 'profile'])->name('customer.profile');
// Route::get('supplier/login', function(){return view('auth.supplier-login');});
// Route::post('/supplier/login', [AuthenticatedSessionController::class, 'store'])->name('supplier-login');

Route::get('register-user/{type}', function($type){
    session()->put(['type' => $type]);
    return redirect()->route('register');
})->name('register-user');
Route::middleware('auth')->get('phone-verify', [PhoneVerificationController::class, 'sendVerification'])->name('phone-verify');
Route::middleware('auth')->get('phone-verification', [PhoneVerificationController::class, 'verifyPhone'])->name('phone-verification');
Route::get('phone-verify', [PhoneVerificationController::class, 'sendVerification']);