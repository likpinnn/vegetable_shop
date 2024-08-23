<?php

use App\Http\Controllers\itemController;
use App\Http\Controllers\userContoller;
use App\Http\Controllers\pageContoller;
use App\Http\Middleware\checkAuth;
use Illuminate\Support\Facades\Route;

Route::controller(userContoller::class)->group(function(){
    Route::post('/register/listing','register')->name('registerListing');
    Route::post('/register/verify','verify')->name('verifyListing');
    Route::post('/login','login')->name('loginListing');
    Route::post('/logout','logout')->name('logout');
    Route::post('/informationListing','information')->name('informationListing');
    
});

Route::controller(itemController::class)->group(function(){
    Route::post('/cartstore/{id}','cart')->name('cart.store')->middleware(checkAuth::class);
    Route::delete('/cartremove/{id}','remove')->name('remove')->middleware(checkAuth::class);
    Route::post('/cartupdate/{id}','update')->name('update')->middleware(checkAuth::class);
});


Route::controller(pageContoller::class)->group(function(){
    Route::get('/','loop')->name('index');
    Route::get('/{id}/buy','store')->name('buy')->middleware(checkAuth::class);
    Route::get('/register','r_show')->name('register');
    Route::get('/verify/{email}','v_show')->name('verify');
    Route::get('/login','l_show')->name('login');
    Route::get('/information','i_show')->name('information');
    Route::get('/about','about')->name('about');
    Route::get('/cart','c_show')->name('cart')->middleware(checkAuth::class);
});

