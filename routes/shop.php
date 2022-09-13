<?php

use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Shop\ShopController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ShopController::class, 'index'])->name('shop.index');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/cart', [ShopController::class, 'cart'])->name('shop.cart');
    Route::post('/cart/product/add', [ShopController::class, 'add'])->name('shop.product.addToCart');
    Route::get('/cart/buy', [ShopController::class, 'buy'])->name('shop.cart.by');
    Route::post('/cart/checkout', [ShopController::class, 'checkout'])->name('shop.cart.checkout');


    Route::get('/user', fn() => Auth()->user());

    Route::get('cart/count', [CartController::class, 'count'])
        ->name('cart.count');

    Route::put('cart/decrease/{rowId}', [CartController::class, 'decreaseQuantity'])
        ->name('api.cart.decrease');

    Route::put('cart/increase/{rowId}', [CartController::class, 'increaseQuantity'])
        ->name('api.cart.increase');

    Route::get('/cart/content', [CartController::class, 'content'])
        ->name('shop.cart.content');

    Route::get('/cart/total', [CartController::class, 'total'])
        ->name('shop.cart.total');

    Route::delete('/cart/remove/item/{id}', [CartController::class, 'removeItem'])
        ->name('shop.cart.remove.item');

});
