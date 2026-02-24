<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SalesController;

Route::get('/', [HomeController::class, 'index']);

Route::prefix('category')->group(function () {
    Route::get('/food-beverage', [ProductController::class, 'category'])->defaults('category', 'Food & Beverage');
    Route::get('/beauty-health', [ProductController::class, 'category'])->defaults('category', 'Beauty & Health');
    Route::get('/home-care', [ProductController::class, 'category'])->defaults('category', 'Home Care');
    Route::get('/baby-kid', [ProductController::class, 'category'])->defaults('category', 'Baby & Kid');
});

Route::get('/user/{id}/name/{name}', [UserController::class, 'profile']);

Route::get('/sales', [SalesController::class, 'index']);