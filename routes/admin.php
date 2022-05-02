<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\GaleriesController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\UsersController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'adminauth'], function () {
    // Admin Dashboard
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.home');

    Route::get('/users', [UsersController::class, 'index'])->name('admin.users.index');
    Route::get('/users/{user}', [UsersController::class, 'show'])->name('admin.users.show');
    Route::delete('/users/{user}', [UsersController::class, 'destroy'])->name('admin.users.destroy');

    Route::get('/transactions', [TransactionController::class, 'index'])->name('admin.transactions.index');

    Route::get('/travel/index', [PostsController::class, 'travel'])->name('admin.posts.travel');
    Route::get('/travel/accepted/{post}', [PostsController::class, 'postAccepted'])->name('admin.post.accepted');
    Route::get('/travel/rejected/{post}', [PostsController::class, 'postRejected'])->name('admin.post.rejected');

    Route::get('/packs/index', [PostsController::class, 'packs'])->name('admin.posts.packs');

    Route::get('/gallery/index', [GaleriesController::class, 'index'])->name('admin.gallery.index');
    Route::post('/gallery/store', [GaleriesController::class, 'store'])->name('admin.gallery.store');

    Route::get('/gallery/show/{gallery}', [GaleriesController::class, 'show'])->name('admin.gallery.show');

    Route::post('/gallery/{gallery}/delete', [GaleriesController::class, 'destroy'])->name('admin.gallery.delete');


    Route::get('/gallery/{gallery}/{media}/{tag}', [GaleriesController::class, 'background'])->name('gallery.background');


    Route::post('/gallery/{gallery}/album/create', [GaleriesController::class, 'albums'])->name('admin.gallery.albums.index');
    Route::post('/gallery/{gallery}/album/create', [GaleriesController::class, 'albums'])->name('admin.gallery.albums.store');

    Route::get('/blog/create', [BlogController::class, 'create'])->name('admin.blog.create');
    Route::post('/blog/create', [BlogController::class, 'store'])->name('admin.blog.store');
    Route::get('/blog/index', [BlogController::class, 'index'])->name('admin.blog.index');
    Route::get('/blog/edit/{blog}', [BlogController::class, 'edit'])->name('admin.blog.edit');
    Route::post('/blog/edit/{blog}', [BlogController::class, 'update'])->name('admin.blog.update');
    Route::post('/blog/delete/{blog}', [BlogController::class, 'destroy'])->name('admin.blog.delete');
    Route::get('/blog/publish/{blog}', [BlogController::class, 'publish'])->name('admin.blog.publish');
});
