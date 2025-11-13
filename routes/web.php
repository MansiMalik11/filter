<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('data', function() {
    return "Hello";
});

//Auth routes
Route::get('/register', [AuthController::class,'showRegister'])->name('show.register');
Route::get('/login', [AuthController::class,'showLogin'])->name('show.login');

//Main Routes
Route::get('/products',[ProductController::class,'view'])->name('products.view');
Route::get('/products/create',[ProductController::class,'create'])->name('products.create');
Route::post('/products',[ProductController::class,'store'])->name('products.store');
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{id}/delete', [ProductController::class, 'destroy'])->name('products.destroy');