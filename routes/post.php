<?php

use App\Http\Controllers\Site\BookingController;
use App\Http\Controllers\Site\CheckoutController;
use App\Http\Controllers\Site\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index'])->name('posts.index');

Route::group(['middleware' => 'auth'], function () {
    Route::get('travel/create', [PostController::class, 'travel'])->name('posts.travel.create');
    Route::post('travel/create', [PostController::class, 'storeTravel']);
    Route::get('coli/create', [PostController::class, 'coli'])->name('posts.coli.create');
    Route::post('coli/create', [PostController::class, 'storeColi']);

    Route::get('{slug}', [PostController::class, 'show'])->name('posts.show');
    Route::post('booking/{post}', [BookingController::class, 'booking']);

    Route::get('booking/validate/{reservation}', [BookingController::class, 'reservationValidate'])->name('booking-validate');
    Route::get('booking/except/{reservation}', [BookingController::class, 'reservationExcept'])->name('booking-except');
    Route::get('booking/remove/{reservation}', [BookingController::class, 'delete'])->name('booking-delete');

    Route::get('reservations/{slug}', [PostController::class, 'reservations'])->name('post.reservation.list');

    Route::get('booking/checkout/{reservation}', [CheckoutController::class, 'checkout'])->name('booking-checkout');
});
