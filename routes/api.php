<?php

use App\Http\Controllers\Api\AdminDashboardController;
use App\Http\Controllers\Api\SupplierDashboardController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\ShopController;
use App\Http\Controllers\Api\AdressController;
use App\Http\Controllers\Auth\Auth\PasswordResetController;
use Illuminate\Http\Request;

Route::get('test-session', function(){
    session()->put('s', 'no');
    return session()->get('s');
});

Route::get('get-session', function(){
    return session()->get('s');
});

Route::post('/login', [LoginController::class, 'login']);
Route::post('/register', [RegisterController::class, 'register']);
Route::middleware('auth:sanctum')->post('/send-verificaion-code', [RegisterController::class, 'sendVerification']);
Route::middleware('auth:sanctum')->post('/verify-phone', [RegisterController::class, 'verifyPhone']);

Route::middleware('guest')->post('get-password-reset-code', [PasswordResetController::class, 'phoneConfirmation']);
Route::middleware('guest')->post('verify-password-reset-code', [PasswordResetController::class, 'codeVerification']);
Route::middleware('guest')->post('reset-password', [PasswordResetController::class, 'resetPassword']);

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

Route::prefix('admin')->middleware(['auth:sanctum','admin'])->group(function(){
    Route::get('dashboard/index', [AdminDashboardController::class, 'index']);
    // Route::get('dashboard/products', [AdminDashboardController::class, 'product']);
    // Route::get('dashboard/categories', [AdminDashboardController::class, 'category']);
    Route::get('dashboard/orders', [AdminDashboardController::class, 'order']);
    // Route::get('dashboard/sliders', [AdminDashboardController::class, 'slider']);
    Route::get('dashboard/users', [AdminDashboardController::class, 'user']);
});

Route::prefix('supplier')->middleware(['auth:sanctum','supplier'])->group(function(){
    Route::get('dashboard/index', [SupplierDashboardController::class, 'index']);
    // Route::get('dashboard/products', [SupplierDashboardController::class, 'product']);
    // Route::get('dashboard/categories', [SupplierDashboardController::class, 'category']);
    Route::get('dashboard/orders', [SupplierDashboardController::class, 'order']);
    // Route::get('dashboard/sliders', [SupplierDashboardController::class, 'slider']);
    Route::get('dashboard/customers', [SupplierDashboardController::class, 'customer']);
});