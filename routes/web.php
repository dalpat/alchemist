<?php

use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Route::resource('items', ItemController::class)->only(['index', 'show']);
Route::resource('news', NewsController::class)->only(['index', 'show']);

Auth::routes();

Route::group([
    'middleware' => ['auth'],
], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('carts', CartController::class)->only(['index', 'store', 'update']);
    Route::resource('products', ProductController::class);
    Route::resource('sales', SalesController::class);
    Route::resource('orders', OrderController::class);

    // Checkout routes
    Route::get('/confirm',[CheckoutController::class,'confirm'])->name('checkout.confirmation');
    Route::post('/confirm',[CheckoutController::class,'placeorder'])->name('checkout.placeorder');
    Route::get('/thankyou',[CheckoutController::class,'thankyou'])->name('checkout.thankyou');
});

// Routes for admin
Route::group([
    'middleware' => ['auth', 'admin'],
    'prefix' => 'admin',
    'as' => 'admin.'
], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::resource('products', AdminProductController::class)->only(['index', 'update']);
    Route::resource('users', UserController::class)->only(['index', 'update']);

    Route::resource('news', AdminNewsController::class);
});
