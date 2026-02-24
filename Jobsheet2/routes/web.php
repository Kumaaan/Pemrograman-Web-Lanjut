<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
 return 'Hello World';
});

Route::get('/world', function () {
 return 'World';
});

Route::get('/', function () {
 return 'Selamat Datang';
});

Route::get('/about', function () {
 return 'Nama: Adi Luhung <br> NIM : 244107020088';
});

Route::get('/user/{name}', function ($name) {
return 'Nama saya '.$name;
});
