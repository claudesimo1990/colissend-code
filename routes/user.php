<?php

use App\Http\Controllers\Site\CheckoutController;
use App\Http\Controllers\Site\ProfileController;
use App\Http\Controllers\Site\UsersPostsController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth'], function () {

    Route::get('/profile/index', [ProfileController::class, 'index'])->name('user.profile.index');
    Route::get('/profile/board', [ProfileController::class, 'board'])->name('user.profile.board');

    Route::get('/profile/detail', [ProfileController::class, 'profile'])->name('user.profile.detail');

    Route::get('/profile/paypal', [ProfileController::class, 'paypal'])->name('user.profile.paypal');
    Route::post('/profile/paypal', [ProfileController::class, 'paypalStore'])->name('user.profile.paypal.store');

    Route::get('/profile/password', [ProfileController::class, 'password'])->name('user.profile.password');
    Route::post('/profile/password', [ProfileController::class, 'passwordStore'])->name('user.profile.password.store');

    Route::get('/profile/bank', [ProfileController::class, 'bank'])->name('user.profile.bank');
    Route::post('/profile/bank', [ProfileController::class, 'bankStore'])->name('user.profile.bank.store');

    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('user.profile.edit');
    Route::post('/profile/edit', [ProfileController::class, 'update'])->name('user.profile.update');

    Route::get('/profile/messages', [ProfileController::class, 'messages'])->name('user.profile.messages');
    Route::post('/profile/messages/all', [ProfileController::class, 'markAllAsRead'])->name('user.profiles.messages.mark-all-read');
    Route::post('/profile/messages/{message}', [ProfileController::class, 'markAsRead']);
    Route::post('/profile/messages/delete/{message}', [ProfileController::class, 'deleteMessage']);

    // posts
    Route::get('/profile/posts', [UsersPostsController::class, 'posts'])->name('user.posts.index');
    Route::get('/profile/travels', [UsersPostsController::class, 'travels'])->name('user.posts.travels');
    Route::get('/profile/packs', [UsersPostsController::class, 'packs'])->name('user.posts.packs');
    Route::get('/profile/bookings', [UsersPostsController::class, 'bookings'])->name('user.posts.bookings');

    Route::get('/profile/friend/invitation', [ProfileController::class, 'invitation'])->name('user.friend.invitation');
    Route::post('/profile/friend/invitation', [ProfileController::class, 'invitationSend']);

    Route::get('/notifications', [ProfileController::class, 'notifications'])->name('user.notifications');
    Route::get('cancel-payment/{reservation}', [CheckoutController::class, 'paymentCancel'])->name('cancel.payment');
    Route::get('payment-success/{reservation}', [CheckoutController::class, 'paymentSuccess'])->name('success.payment');
});
