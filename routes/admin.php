<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\UsersController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'adminauth'], function () {
    // Admin Dashboard
    Route::get('/home', [AdminController::class, 'dashboard'])->name('admin.home');

    Route::get('/users', [UsersController::class, 'index'])->name('admin.users.index');
    Route::get('/users/{user}', [UsersController::class, 'show'])->name('admin.users.show');

    Route::get('/transactions', [TransactionController::class, 'index'])->name('admin.transactions.index');

    Route::get('/travel/index', [PostsController::class, 'travel'])->name('admin.posts.travel');
    Route::get('/travel/accepted/{post}', [PostsController::class, 'postAccepted'])->name('admin.post.accepted');
    Route::get('/travel/rejected/{post}', [PostsController::class, 'postRejected'])->name('admin.post.rejected');

    Route::get('/packs/index', [PostsController::class, 'packs'])->name('admin.posts.packs');
});
