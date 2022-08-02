<?php

use App\Http\Controllers\Shop\ShopController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ShopController::class, 'index'])->name('shop.index');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/cart', [ShopController::class, 'cart'])->name('shop.cart');
    Route::post('/cart/product/add', [ShopController::class, 'add'])->name('shop.product.addToCart');
});

