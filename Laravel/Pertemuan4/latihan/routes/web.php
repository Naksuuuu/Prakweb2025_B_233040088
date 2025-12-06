<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/categories', [CategoriesController::class, 'index'])->name('categories.index');

Route::controller(PostController::class)->name('posts.')->group(function () {
    Route::get('/posts/{post}', 'show')->name('show');
    Route::get('/posts', 'index')->name('index');
});

Route::prefix('/dashboard')->name('dashboard.')->middleware('auth', 'verified')->group(function () {
    Route::controller(DashboardPostController::class)->prefix('/posts')->name('posts.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::get('/create', 'create')->name('create');
        Route::get('/{post:slug}', 'show')->name('show');
    });
});


Route::controller(AuthController::class)->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/register', 'showRegister')->name('showRegister');
        Route::post('/register', 'register')->name('register');
        Route::get('/login', 'showLogin')->name('showLogin');
        Route::post('/login', 'login')->name('login');
    });

    Route::middleware('auth')->group(function () {
        Route::post('/logout', 'logout')->name('logout');
    });
});
