<?php

use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('posts', [PostController::class, 'posts'])->name('api.posts');

Route::get('posts/{id}', [PostController::class, 'posts']);
Route::post('posts', [PostController::class, 'filter'])->name('api.posts.filter');

Route::get('messages/with/{id}', [MessageController::class, 'getMessagesFor']);
Route::post('messages', [MessageController::class, 'store']);

Route::get('/user', fn(Request $request) => $request->user());

Route::middleware('auth:sanctum')->group(function() {
    Route::get('/user', fn(Request $request) => $request->user());

    Route::get('cart/count', [CartController::class, 'count'])
        ->name('cart.count');
    Route::put('cart/decrease/{rowId}', [CartController::class, 'decreaseQuantity'])
        ->name('api.cart.decrease');
    Route::put('cart/increase/{rowId}', [CartController::class, 'increaseQuantity'])
        ->name('api.cart.increase');
    Route::apiResource('cart', CartController::class);
});
