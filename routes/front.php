<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Front\MainController;
use \App\Http\Controllers\Front\ReserveController;

Route::get('/logout' , function (){
    auth()->logout();
    return redirect('/');
});

Route::get('/' , [MainController::class , 'index'] );
Route::get('/centers/{slug}' , [MainController::class , 'center_detail']);
Route::post('/reserve/{slug}' , [ReserveController::class , 'reserve'])->name('reserve');
Route::get('/reserve/{slug}' , [ReserveController::class , 'ShowReservePage'])->name('Show_Reserve');
Route::get('/mizbans/{slug}' , [MainController::class , 'mizbans']);
Route::get('/centers' , [MainController::class , 'centers']);
Route::get('/galleries' , [MainController::class , 'galleries']);
Route::get('/about_us' , [MainController::class , 'about_us']);
Route::get('/contact_us' , [MainController::class , 'contact_us_show']);
Route::post('/contact_us' , [MainController::class , 'contact_us_submit'])->name('contact_us');
Route::get('/blogs' , [MainController::class , 'blogs']);
Route::get('/blogs/{slug}' , [MainController::class , 'blog_detail']);
Route::get('/centers/blogs/{slug}' , [MainController::class , 'blogs_center']);
