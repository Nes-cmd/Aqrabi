<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use App\Http\Livewire\SingleProduct;
use App\Http\Livewire\ShopComponent;


Route::get('shop/single-product/{id}', SingleProduct::class)->name('shop.single-product');
Route::get('shop/producs', ShopComponent::class)->name('shop.list');

Route::view('shop/contact', 'customer.contact')->name('shop.contact');


Route::get('admin/product/add-product', [ProductController::class ,'addProduct'])->name('admin.add-product');
Route::post('admin/product/store-product', [ProductController::class ,'storeProduct'])->name('admin.store-product');
Route::post('admin/product/store-category', [CategoryController::class ,'storeCategory'])->name('admin.store-category');
Route::get('admin/product/add-category', [CategoryController::class, 'index'])->name('admin.add-category');

//Language Translation
Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);

Route::get('/', function(){
    return view('customer.index');
})->name('shop.index');
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'root'])->name('root');

Route::get('supplier/login', function(){
    return view('auth.supplier-login');
});
Route::post('/supplier/login', [AuthenticatedSessionController::class, 'store'])->name('supplier-login');

//Update User Details
Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');

Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
Auth::routes();