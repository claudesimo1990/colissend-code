<?php

use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('posts', [PostController::class, 'posts'])->name('api.posts');
Route::post('posts', [PostController::class, 'filter'])->name('api.posts.filter');

Route::get('posts/{id}', [PostController::class, 'posts']);

Route::get('messages/with/{id}', [MessageController::class, 'getMessagesFor']);
Route::post('messages', [MessageController::class, 'store']);

Route::get('/user', fn(Request $request) => $request->user());
