<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PaymentController;
use \App\Http\Controllers\GoogleAuthController;
use \App\Http\Controllers\SiteMapController;
use \App\Http\Controllers\FeedController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//
//
//    \App\Models\User::create(
//        [
//            'username' => 'mras',
//            'password' => \Illuminate\Support\Facades\Hash::make('123'),
//            'name' => 'ashkan',
//            'email' => 'as@gmail.com',
//            'phone' => '123',
//            'email_verified_at' => \Carbon\Carbon::now()
//        ]
//    );
//    auth()->loginUsingId(1);
//
//
////    $centers = \App\Models\Center::with('reserves')->get();
////    $topFiveCenters = $centers->sortByDesc(function($user){
////        return $user->reserves->count();
////    })->take(5);
//
//    return view('welcome');
//});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

/////////////////////////////////////////

// پرداخت و درگاه پرداخت
Route::get('pay' , [PaymentController::class , 'Show']);
Route::post('payment/{slug}' , [PaymentController::class , 'Pay'])->name('payment');
Route::get('payment/callback' , [PaymentController::class , 'Callback'])->name('callback');


// Google Auth
Route::get('login/google' , [GoogleAuthController::class , 'redirectToProvider'])->name('google_auth');
Route::get('login/google/callback' , [GoogleAuthController::class , 'handleProviderCallback']);


// SiteMap
Route::get('sitemap.xml' , [SiteMapController::class , 'index']);
Route::get('sitemap-articles.xml' , [SiteMapController::class , 'articles']);
Route::get('sitemap-centers.xml' , [SiteMapController::class , 'centers']);
Route::get('sitemap-categories.xml' , [SiteMapController::class , 'categories']);
Route::get('sitemap-products.xml' , [SiteMapController::class , 'products']);
Route::get('sitemap-options.xml' , [SiteMapController::class , 'options']);
Route::get('sitemap-states.xml' , [SiteMapController::class , 'states']);
Route::get('sitemap-cities.xml' , [SiteMapController::class , 'cities']);

// Feed
Route::get('feed' , [FeedController::class , 'articles']);
