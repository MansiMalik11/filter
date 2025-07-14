<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('data', function() {
    return "Hello";
});
//Main Routes
Route::get('/products',[ProductController::class,'view'])->name('products.index');
Route::get('/products/create',[ProductController::class,'create'])->name('products.create');
Route::post('/products',[ProductController::class,'store'])->name('products.store');