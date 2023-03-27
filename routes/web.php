<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthorizationController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



# Auth
/*
Route::get('/gate', [App\Http\Controllers\AuthorizationController::class, 'index'])->name('gate.index')->middleware('can:isAdmin');
Route::get('/gate', [App\Http\Controllers\AuthorizationController::class, 'index'])->name('gate.index')->middleware('can:isUser');
Route::get('/gate', [App\Http\Controllers\AuthorizationController::class, 'index'])->name('gate.index')->middleware('can:isEditor');
Route::get('/gate', [App\Http\Controllers\AuthorizationController::class, 'index'])->name('gate');
*/

Route::controller(AuthorizationController::class)->group(function(){
    Route::get('gate','index')->name('gate.index')->middleware('can:isAdmin'); 
    // Route::get('gate','index')->name('gate.index')->middleware('can:isAdmin'); 
});




# Post
/*
Route::controller(PostController::class)->group(function(){
    Route::get('posts/delete','delete')->name('post.delete')->middleware('can:isAdmin');
    Route::get('posts/update','update')->name('post.update')->middleware('can:isEditor');
    Route::get('posts/create','create')->name('post.create')->middleware('can:isUser');
});
*/


Route::controller(PostController::class)->group(function(){
    Route::get('/posts','index')->name('post.index'); 
    Route::get('/posts/{post}','show')->name('post.show')->middleware('can:view,post'); 
    Route::get('/posts/{post}','destroy')->name('post.show')->middleware('can:delete,post'); 
});


// Route::get('/posts', [PostController::class, 'index']);