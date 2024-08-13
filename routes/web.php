<?php

use App\Http\Controllers\userContoller;
use App\Http\Controllers\pageContoller;
use Illuminate\Support\Facades\Route;

Route::controller(userContoller::class)->group(function(){
    Route::post('/register/listing','register')->name('registerListing');
    Route::post('/register/verify','verify')->name('verifyListing');
    Route::post('/login','login')->name('loginListing');
    Route::post('/logout','logout')->name('logout');
});


Route::controller(pageContoller::class)->group(function(){
    Route::get('/','loop')->name('index');
    Route::get('/{id}/buy','store')->name('buy');
    Route::get('/register','r_show')->name('register');
    Route::get('/verify/{email}','v_show');
    Route::get('/login','l_show')->name('login');
});

