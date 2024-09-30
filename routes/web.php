<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\RegisteredUser;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\PostController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

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

    Route::controller(CategoryController::class)->group(function(){

        Route::get('/newcategory','create')->name('dashboard.newcategory');
        Route::post('/newcategory','store')->name('category.store');
        Route::get('/categories','index')->name('categories');
        Route::delete('/categories/{id}','destroy')->name('dashboard.deletecategory');
    });
    Route::controller(PostController::class)->group(function(){
        Route::get('/newpost','create')->name('newpost');
        Route::post('/newpost','store')->name('storepost');
        Route::get('/posts','showbyUser')->name('showpostbyuser');
        Route::delete('/posts/{post}','destroy')->name('deletepost');

    });

})->middleware('auth');
Route::post('comments/store', [CommentController::class, 'store'])->name('comments.store')->middleware('auth');

Route::controller(PostController::class)->group(function(){
    Route::get('posts/{url}','show')->name('showpost');
    
});