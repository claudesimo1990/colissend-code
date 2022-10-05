<?php

use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\social\LoginController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Pub\PubController;
use App\Http\Controllers\Site\BlogController;
use App\Http\Controllers\Site\HomeController;
use App\Mail\SuccessPayment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redis;

Route::get('/', [HomeController::class, 'home'])->name('welcome');
Route::get('/faq', [HomeController::class, 'faq'])->name('faq');
Route::get('/impressum', [HomeController::class, 'impressum'])->name('impressum');
Route::get('/about-us', [HomeController::class, 'about'])->name('about-us');
Route::get('/contact-us', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact-us', [HomeController::class, 'sendMessage']);
Route::get('/privacy-policy', [HomeController::class, 'privacy'])->name('privacy');
Route::get('/how-it-works/{id}', [HomeController::class, 'howItWorks'])->name('howItWorks');
Route::get('/now_more', [HomeController::class, 'more'])->name('more');
Route::get('/how/post/travel', [HomeController::class, 'postTravel'])->name('how_post_travel');
Route::get('/how/post/pack', [HomeController::class, 'postPack'])->name('how_post_pack');

//Blog
Route::get('blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('blog/show/{blog}', [BlogController::class, 'show'])->name('blog.show');

//PUBS
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
Route::get('/email/verify/{hash}', [VerificationController::class, 'resend']);

//SOCIAL LOGIN
Route::get('/google/login', [LoginController::class, 'google'])->name('google');
Route::get('/google/callback', [LoginController::class, 'googleCallBack'])->name('googleCallBack');

Route::get('/facebook/login', [LoginController::class, 'facebook'])->name('facebook');
Route::get('/facebook/callback', [LoginController::class, 'facebookCallBack'])->name('facebookCallBack');

Route::get('/account/confirmation/{user}/{token}', [RegisterController::class, 'confirmation'])->name('user.account.confirmation');

Route::get('test', function (\App\Repository\CartRepository $cartRepository) {

//    $details['name'] = 'Simo';
//    $details['email'] = 'claudesimo1990@gmail.com';
//
//    dispatch(new SendWelcomeEmailJob($details));


    //TODO Generer la facture

    $order = \App\Models\Order::find(103);

    $details = [
        'name' => Auth::user()->firstname . ' ' . Auth::user()->lastname,
        'street' => Auth::user()->profile->street,
        'city' => Auth::user()->profile->city,
        'phone' => Auth::user()->profile->phone,
        'email' => Auth::user()->email,

        'invoice_number' =>  uniqid(),
        'order_number' =>  $order->order_number,
        'order_date' =>    formatDate($order->created_at),
        'shipped_date' =>    formatDate($order->created_at->addDays(4)),

        'products' => $order->products,

        'total' => $cartRepository->total()
    ];

    $pdf = \PDF::loadView('pdf.invoice', compact('details'));



    return $pdf->outputHtml();




//    //TODO Attacher la facture a l email et l envoyer au client.
//    Mail::to(env('ADMIN_EMAIL'))
//        ->send(new SuccessPayment($pdf));

});
