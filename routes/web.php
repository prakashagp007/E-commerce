<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;




// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/',[FrontendController::class, 'home'])->name('home');

// product controller

Route::get('/product/create',
    [ProductController::class,'create']);

Route::post('/product/store',
    [ProductController::class,'store'])
    ->name('product.store');


    //actions

Route::get('/dashboard',[ProductController::class, 'dashboard'])->name('dashboard');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('products.show');
Route::delete('/product/{id}', [ProductController::class, 'delete'])->name('products.destroy');
Route::get('/product/{id}/edit', [ProductController::class, 'edit'])
    ->name('products.edit');

Route::put('/product/{id}', [ProductController::class, 'update'])
    ->name('products.update');

    // Guest routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
});

// Auth protected routes
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::post('/cart/add/{productId}', [CartController::class, 'add'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
});
