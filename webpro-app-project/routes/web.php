<?php

use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProductController; 
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('students', StudentController::class);

Route::get('/latihan', [StudentController::class, 'latihan']);

Route::get('/helo', function () {
    return "Hello World";
});

Route::get('/products', [ProductController::class, 'index']); 

Route::resource('mahasiswa', MahasiswaController::class);