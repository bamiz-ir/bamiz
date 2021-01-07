<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Front\MainController;
use \App\Http\Controllers\Front\ReserveController;

Route::get('/' , [MainController::class , 'index'] );
Route::get('/centers/{slug}' , [MainController::class , 'center_detail']);
Route::post('/reserve/{slug}' , [ReserveController::class , 'reserve'])->name('reserve');
Route::get('/reserve/{slug}' , [ReserveController::class , 'ShowReservePage'])->name('Show_Reserve');
