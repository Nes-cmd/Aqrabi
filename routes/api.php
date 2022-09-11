<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\Auth\RegisterController;
// Authentication api routes
Route::post('/login', [App\Http\Controllers\Api\Auth\LoginController::class, 'login']);
Route::controller(App\Http\Controllers\Api\Auth\RegisterController::class)->group(function(){
    Route::post('/register', 'register');
    Route::post('/send-verificaion-code', 'sendVerification')->middleware('auth:sanctum');
    Route::post('/verify-phone', 'verifyPhone')->middleware('auth:sanctum');
});

// Password reset api routes
Route::middleware('guest')->controller(App\Http\Controllers\Api\Auth\PasswordResetController::class)->group(function(){
    Route::post('get-password-reset-code', 'phoneConfirmation');
    Route::post('verify-password-reset-code', 'codeVerification');
    Route::post('reset-password', 'resetPassword');
});

// Cart Api rotes
Route::controller(App\Http\Controllers\Api\CartController::class)->prefix('customer')->middleware('auth:sanctum')->group(function(){
    Route::post('/add-to-cart', 'addToCart');
    Route::get('/cart-list', 'getCart');
    Route::get('/remove-cart/{id}', 'removeCart');
    Route::get('/remove-cart-all', 'removeAllCart');
});

// Product APIs
Route::controller(App\Http\Controllers\Api\ShopController::class)->prefix('shop')->group(function(){
    Route::get('/categories', 'categories');
    Route::get('/all-products', 'products');
    Route::get('/product-by-category/{id}', 'productByCategoryId');
    Route::get('/product-by-supplier/{id}', 'productBySupplierId');
    Route::get('/product-group-category','productGroupByCategory');
    Route::get('/product-group-supplier', 'productGroupBySupplier');
    Route::get('/product-single/{id}', 'singleProduct');
    Route::get('/get-sliders', 'getSliders');
});

// API to access and store adresses
Route::controller(App\Http\Controllers\Api\AdressController::class)->prefix('adress')->group(function(){
    Route::get('get-countries', 'getCountries');
    Route::middleware('auth:sanctum')->get('get-shippment-adress', 'getShippmentAdress');
    Route::middleware('auth:sanctum')->get('get-supplier-adress', 'getSupplierAdress');
    Route::middleware('auth:sanctum')->post('store-shippment-adress', 'storeShippmentAdress');
});

//Admin dashboard api routes group 
Route::controller(App\Http\Controllers\Api\AdminDashboardController::class)->prefix('admin')->middleware(['auth:sanctum','admin'])->group(function(){
    Route::get('dashboard/index', 'index');
    // Route::get('dashboard/products', [AdminDashboardController::class, 'product']);
    // Route::get('dashboard/categories', [AdminDashboardController::class, 'category']);
    Route::get('dashboard/orders', 'order');
    // Route::get('dashboard/sliders', [AdminDashboardController::class, 'slider']);
    Route::get('dashboard/users', 'user');
});

// Supplier dashboard api
Route::controller(App\Http\Controllers\Api\SupplierDashboardController::class)->prefix('supplier')->middleware(['auth:sanctum','supplier'])->group(function(){
    Route::get('dashboard/index', 'index');
    // Route::get('dashboard/products', [SupplierDashboardController::class, 'product']);
    // Route::get('dashboard/categories', [SupplierDashboardController::class, 'category']);
    Route::get('dashboard/orders', 'order');
    // Route::get('dashboard/sliders', [SupplierDashboardController::class, 'slider']);
    Route::get('dashboard/customers', 'customer');
});