<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/categories', [CategoriesController::class, 'index'])->name('categories.index');

Route::controller(PostController::class)->name('posts.')->group(function () {
    Route::get('/posts/{post}', 'show')->name('show');
    Route::get('/posts', 'index')->name('index');
});


Route::controller(AuthController::class)->middleware('guest')->group(function () {
    Route::get('/register', 'showRegister')->name('showRegister');
    Route::post('/register', 'register')->name('register');
    Route::get('/login', 'showLogin')->name('showLogin');
    // Route::post('/login', 'login')->name('login');
    Route::post('/logout', 'logout')->middleware('auth')->name('logout');
});
