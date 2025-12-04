<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

//Auth routes
Route::post('/logout', [AuthController::class,'logout'])->name('logout');

Route::middleware('guest')->controller(AuthController::class)->group(function(){
    Route::get('/register', 'showRegister')->name('show.register');
    Route::get('/login', 'showLogin')->name('show.login');
    Route::post('/register', 'register')->name('register');
    Route::post('/login', 'login')->name('login');
});

//Main Routes
Route::middleware('auth')->controller(ProductController::class)->group(function(){
    Route::get('/products','view')->name('products.view');
    Route::get('/products/create','create')->name('products.create');
    Route::post('/products','store')->name('products.store');
    Route::get('/products/{product}/edit', 'edit')->name('products.edit');
    Route::put('/products/{product}', 'update')->name('products.update');
    Route::delete('/products/{id}/delete', 'destroy')->name('products.destroy');
});