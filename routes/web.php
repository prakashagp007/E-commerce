<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Backend\ProductController;


// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/',[FrontendController::class, 'home']);

// product controller

Route::get('/product/create',
    [ProductController::class,'create']);

Route::post('/product/store',
    [ProductController::class,'store'])
    ->name('product.store');
