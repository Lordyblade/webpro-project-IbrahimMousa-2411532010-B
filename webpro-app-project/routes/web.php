<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/helo', function () {
    return "Hello World";
});

use App\Http\Controllers\ProductController; 
Route::get('/products', [ProductController::class, 'index']); 

use App\Http\Controllers\MahasiswaController;
Route::resource('mahasiswa', MahasiswaController::class);