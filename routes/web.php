<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegisteredUser;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/',[PostController::class,'index']);

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
        Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('postedit');
        Route::put('/posts/{post}', [PostController::class, 'update'])->name('postupdate');

    });
    Route::controller(PageController::class)->group(function(){
        Route::get('/newpage','create')->name('newpage');
        Route::get('/pages','showbyuser')->name('showpagesbyuser');
        Route::post('/newpage','store')->name('storepage');
        Route::delete('/pages/{page}','destroy')->name('deletepage');
        Route::get('/pages/{page}/edit', 'edit')->name('pageedit');
        Route::put('/pages/{page}', 'update')->name('updatepage');


    });
    Route::get('/comments',[CommentController::class,'index'])->name('managecomments');
    Route::post('/comments/{comment}',[CommentController::class,'action'])->name('actioncomment');


    Route::get('/registeruser',[RegisteredUser::class,'create'])->name('createuser')->middleware('can:admin');
    Route::post('/registeruser',[RegisteredUser::class,'createtheuser'])->name('createtheuser')->middleware('can:admin');


})->middleware('auth');

Route::post('comments/store', [CommentController::class, 'store'])->name('comments.store')->middleware('auth');
Route::get('pages/{url}',[PageController::class,'show'])->name('showpage');
Route::get('posts/{url}',[PostController::class,'show'])->name('showpost');
