<?php

use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

// Misclaneous
Route::view('/choose-acccount-type','customer.choose-user')->name('choose-acccount-type');
Route::get('register-user/{type}', function($type){
    session()->put(['type' => $type]);
    return redirect()->route('register'); 
})->name('register-user');

// Products route
Route::get('/', [ShopController::class, 'index'])->name('shop.index');
Route::view('shop/contact', 'customer.contact')->name('shop.contact');
Route::get('shop/single-product/{id}', App\Http\Livewire\SingleProduct::class)->name('shop.single-product');
Route::get('shop/producs', App\Http\Livewire\ShopComponent::class)->name('shop.list');
Route::get('shop/search/{query?}', App\Http\Livewire\ShopComponent::class)->name('shop.search');

// Make order
Route::middleware('auth')->prefix('shop')->name('shop.')->group(function(){
    Route::get('cart-detail', App\Http\Livewire\CartDetail::class)->name('cart-detail');
    Route::get('checkout', App\Http\Livewire\CheckoutComponent::class)->name('checkout');
    Route::get('wishlist', App\Http\Livewire\Wishlist::class)->name('wishlist');
    Route::get('order-success/{id}', [ShopController::class, 'orderSuccess']);
});

// Custmer profile manegment
Route::controller(App\Http\Controllers\CustomerDashboardController::class)->prefix('costomer')->middleware('auth')->name('customer.')->group(function(){
    Route::get('dashboard', 'dashboard')->name('dashboard');
    Route::get('orders', 'orders')->name('orders');
    Route::get('address', 'address')->name('address');
    Route::get('profile', 'profile')->name('profile');
});

// Phone verification routes
Route::middleware('auth')->controller(App\Http\Controllers\Auth\PhoneVerificationController::class)->group(function(){
    Route::get('verify-phone', 'sendVerification')->name('verify-phone');
    Route::get('phone-verification', 'verifyPhone')->name('phone-verification');
    Route::get('verification-resend', 'resend')->name('verification-resend');
    Route::post('check-verification', 'checkVerification')->name('check-verification');
});

//Password rest routes
Route::middleware('guest')->controller(App\Http\Controllers\Auth\PasswordResetController::class)->group(function(){
    Route::get('forget-password', 'resetView')->name('forget-password');
    Route::get('confirm-phone', 'confirmPhoneView')->name('confirm-phone');
    Route::get('code-resend',  'codeResend')->name('code-resend');
    Route::post('phone-confirmation', 'phoneConfirmation')->name('phone-confirmation');
    Route::get('password-change', 'passwordChangeView')->name('password-change');
    Route::post('code-confirmation', 'codeConfirmation')->name('code-confirmation');
    Route::post('change-password',  'changePassword')->name('change-password');
});