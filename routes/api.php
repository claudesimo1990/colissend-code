<?php

use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\PostController;
use Illuminate\Support\Facades\Route;

Route::get('posts', [PostController::class, 'posts'])->name('api.posts');

Route::get('posts/{id}', [PostController::class, 'posts']);
Route::post('posts', [PostController::class, 'filter'])->name('api.posts.filter');

Route::get('messages/with/{id}', [MessageController::class, 'getMessagesFor']);
Route::post('messages', [MessageController::class, 'store']);
