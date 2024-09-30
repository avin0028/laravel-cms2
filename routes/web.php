<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegisteredUser;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::view('/','dashboard.index');

Route::controller(RegisteredUser::class)->group(function(){
    Route::get('/register','index')->name('register.index');
    Route::post('/register','store')->name('register.store');
});

Route::controller(SessionController::class)->group(function(){
    Route::get('/login','index')->name('login.index');
    Route::post('/login','store')->name('login.store');
    Route::post('/logout','destroy')->name('logout');
});

Route::prefix('/dashboard')->group(function(){
    Route::view('/','dashboard.index')->name('dashboard.index');
    Route::view('/newpost','dashboard.newpost')->name('dashboard.newpost');
    Route::get('/newcategory',[CategoryController::class,'create'])->name('dashboard.newcategory');
    Route::post('/newcategory',[CategoryController::class,'store'])->name('category.store');
    Route::get('/categories',[CategoryController::class,'index'])->name('dashboard.categories');
    Route::delete('/categories/{id}',[CategoryController::class,'destroy'])->name('dashboard.deletecategory');

})->middleware('auth');
