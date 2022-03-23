<?php

use App\Http\Controllers\Site\CheckoutController;
use App\Http\Controllers\Site\ProfileController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth'], function () {
    Route::get('/profile/{profile}', [ProfileController::class, 'show'])->name('user.profile.show');
    Route::post('/profile/{profile}', [ProfileController::class, 'edit'])->name('user.profile.edit');
    Route::post('/profile/password/reset', [ProfileController::class, 'changePassword'])->name('user.password.change');
    Route::get('/notifications', [ProfileController::class, 'notifications'])->name('user.notifications');
    Route::get('cancel-payment/{reservation}', [CheckoutController::class, 'paymentCancel'])->name('cancel.payment');
    Route::get('payment-success/{reservation}', [CheckoutController::class, 'paymentSuccess'])->name('success.payment');
});
