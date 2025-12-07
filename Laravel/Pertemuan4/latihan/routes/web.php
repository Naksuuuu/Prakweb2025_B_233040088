<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\PostController as DashboardPostController;
use App\Http\Controllers\Dashboard\CategoryController as DashboardCategoryController;;

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');

Route::controller(PostController::class)->name('posts.')->group(function () {
    Route::get('/posts/{post}', 'show')->name('show');
    Route::get('/posts', 'index')->name('index');
});

Route::prefix('/dashboard')->name('dashboard.')->middleware('auth', 'verified')->group(function () {

    Route::controller(DashboardController::class)->group(function () {
        Route::get('/', 'index')->name('home');
    });

    Route::controller(DashboardPostController::class)->prefix('/posts')->name('posts.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::get('/create', 'create')->name('create');
        Route::get('/{post:slug}', 'show')->name('show');
        Route::get('/edit/{post:slug}', 'edit')->name('edit');
        Route::put('/edit/{post:slug}', 'update')->name('update');
        Route::delete('/delete/{post:slug}', 'destroy')->name('destroy');
    });

    Route::controller(DashboardCategoryController::class)->prefix('/categories')->name('categories.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::get('/create', 'create')->name('create');
        Route::get('/{category:name}', 'show')->name('show');
        Route::get('/edit/{category:name}', 'edit')->name('edit');
        Route::put('/edit/{category:id}', 'update')->name('update');
        Route::delete('/delete/{category:name}', 'destroy')->name('destroy');
    });
});


Route::controller(AuthController::class)->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/register', 'showRegister')->name('showRegister');
        Route::post('/register', 'register')->name('register');
        Route::get('/login', 'showLogin')->name('showLogin');
        Route::post('/login', 'login')->name('login');
    });

    Route::post('/logout', 'logout')->middleware('auth')->name('logout');
});
