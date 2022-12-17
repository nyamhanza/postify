<?php

use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserPostController;
use Illuminate\Support\Facades\Route;



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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
Route::get('/posts',[PostController::class,'index'])->name('posts');
Route::get('/users/{user:username}/posts',[UserPostController::class,'index'])->name('user.post');
Route::post('/posts',[PostController::class,'store'])->name('posts');
Route::get('/posts/{post}',[PostController::class,'show'])->name('posts.show');

Route::post('/posts/{post}/likes',[LikeController::class,'store'])->name('like');
Route::delete('/posts/{post}/likes',[LikeController::class,'destroy'])->name('like');
Route::delete('/posts/{post}',[PostController::class,'destroy'])->name('delete');

