<?php

use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Pub\PubController;
use App\Http\Controllers\Site\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'])->name('welcome');
Route::get('/faq', [HomeController::class, 'faq'])->name('faq');
Route::get('/impressum', [HomeController::class, 'impressum'])->name('impressum');
Route::get('/about-us', [HomeController::class, 'about'])->name('about-us');
Route::get('/contact-us', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact-us', [HomeController::class, 'sendMessage']);
Route::get('/how-it-works/{id}', [HomeController::class, 'howItWorks'])->name('howItWorks');






Route::get('pubs/index', [PubController::class, 'index'])->name('pub.index');

//messages
Route::group(['middleware' => 'auth'], function () {
    Route::get('/messages', [MessageController::class, 'messages'])->middleware('auth');
    Route::post('/messages', [MessageController::class, 'store'])->middleware('auth');
});

//admin login
Route::get('admin/login',[AuthController::class, 'getLogin'])->name('admin.login');
Route::post('admin/login', [AuthController::class, 'postLogin']);
Route::post('admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

Auth::routes(['verify' => true]);

Route::get('/account/confirmation/{user}/{token}', [RegisterController::class, 'confirmation'])->name('user.account.confirmation');
