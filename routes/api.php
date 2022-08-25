<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\ShopController;
use App\Http\Controllers\Api\AdressController;

Route::post('/login', [LoginController::class, 'login']);
Route::post('/register', [RegisterController::class, 'register']);

Route::prefix('customer/')->middleware('auth:sanctum')->group(function(){
    Route::post('/add-to-cart', [CartController::class, 'addToCart']);
    Route::get('/cart-list', [CartController::class, 'getCart']);
    Route::get('/remove-cart/{id}', [CartController::class, 'removeCart']);
    Route::get('/remove-cart-all', [CartController::class, 'removeAllCart']);
});

Route::prefix('shop')->group(function(){
    Route::get('/categories', [ShopController::class, 'categories']);
    Route::get('/all-products', [ShopController::class, 'products']);
    Route::get('/product-by-category/{id}', [ShopController::class, 'productByCategoryId']);
    Route::get('/product-by-supplier/{id}', [ShopController::class, 'productBySupplierId']);
    Route::get('/product-group-category', [ShopController::class, 'productGroupByCategory']);
    Route::get('/product-group-supplier', [ShopController::class, 'productGroupBySupplier']);
    Route::get('/product-single/{id}', [ShopController::class, 'singleProduct']);
    Route::get('/get-sliders', [ShopController::class, 'getSliders']);
});

Route::prefix('adress')->group(function(){
    Route::get('get-countries', [AdressController::class, 'getCountries']);
    Route::middleware('auth:sanctum')->get('get-shippment-adress', [AdressController::class, 'getShippmentAdress']);
    Route::middleware('auth:sanctum')->get('get-supplier-adress', [AdressController::class, 'getSupplierAdress']);
    Route::middleware('auth:sanctum')->post('store-shippment-adress', [AdressController::class, 'storeShippmentAdress']);
});
