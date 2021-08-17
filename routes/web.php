<?php

use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Farmer\ProductController as FarmerProductController;
use App\Http\Controllers\Farmer\DashboardController as FarmerDashboardController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Route::resource('products', ProductController::class)->only(['index', 'show']);
Route::resource('news', NewsController::class)->only(['index', 'show']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Routes for admin
Route::group([
    'middleware' => ['auth', 'admin'],
    'prefix' => 'admin',
    'as' => 'admin.'
], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::resource('products', AdminProductController::class)->only(['index', 'update']);

    Route::resource('news', AdminNewsController::class);
});


// Routes for farmers
Route::group([
    'middleware' => ['auth', 'farmer'],
    'prefix' => 'farmer',
    'as' => 'farmer.',
], function () {
    Route::get('dashboard', [FarmerDashboardController::class, 'index'])->name('dashboard.index');
    Route::resource('products', FarmerProductController::class);
});



// Routes for vendors
Route::group([
    'middleware' => ['auth'],
], function () {
    Route::resource('carts', CartController::class)->only(['index','store','update']);
});
