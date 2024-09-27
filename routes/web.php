<?php

use App\Http\Controllers\RegisteredUser;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::view('/','dashboard');

Route::controller(RegisteredUser::class)->group(function(){
    Route::get('/register','index')->name('register.index');
    Route::post('/register','store')->name('register.store');
});
Route::controller(SessionController::class)->group(function(){
    Route::get('/login','index')->name('login.index');
    Route::post('/login','store')->name('login.store');
});
