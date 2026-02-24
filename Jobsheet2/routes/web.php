<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PhotoController;

Route::get('/world', function () {
    return 'World';
}); 

Route::get('/user/{name?}', function ($name='John') {
    return 'Nama saya '.$name;
}); 

Route::get('/posts/{post}/comments/{comment}', function ($postId, $commentId) {
    return 'Pos ke-'.$postId." Komentar ke-: ".$commentId;
}); 

Route::get('/hello', [WelcomeController::class, 'hello']); 

Route::get('/', HomeController::class); 
Route::get('/about', AboutController::class);
Route::get('/articles/{id}', ArticleController::class); 

Route::resource('photos', PhotoController::class); 

// Anda bisa mengaktifkan salah satu dari baris di bawah ini dan mematikan Route::resource di atas:
// Route::resource('photos', PhotoController::class)->only(['index', 'show']); // [cite: 352]
// Route::resource('photos', PhotoController::class)->except(['create', 'store', 'update', 'destroy']); // [cite: 354]

Route::get('/greeting', [WelcomeController::class, 'greeting']);