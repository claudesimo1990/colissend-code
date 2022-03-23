<?php

use App\Http\Controllers\Api\MessageController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth'], function () {
    Route::get('all', [MessageController::class, 'messages'])->name('chat.messages.index');
    Route::get('navMessages', [MessageController::class, 'navMessages'])->name('navMessages');
    Route::post('all', [MessageController::class, 'store']);
    Route::get('with/{id}', [MessageController::class, 'getMessagesFor'])->name('chat.messages.with');
});
