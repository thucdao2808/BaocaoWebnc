<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\isAdmin;
use App\Http\Middleware\isMember;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BlogController; 
use App\Http\Controllers\HomeController; 




Route::get('/', function () {
    return view('welcome');
});
Route::middleware(['auth',isMember::class])->get('home', [HomeController::class, 'index'])->name('home');

Route::get('/login', [AuthController::class, 'Showform_login'])->name('login');
Route::get('/register', [AuthController::class, 'Showform_register'])->name('register');

Route::post('/login', [AuthController::class, 'handle_login']);
Route::post('/register', [AuthController::class, 'handle_register']);

Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth',isAdmin::class])->prefix('admin')->group(function () {

    Route::get('/', [AdminController::class, 'index'])->name('admin');

    Route::resource('products', ProductController::class);

    Route::resource('categories', CategoryController::class);

    Route::resource('tags', TagController::class);

    Route::prefix('banners')->group(function() {
        Route::get('/', [BannerController::class, 'index'])->name('banners.index');

        Route::post('create', [BannerController::class, 'store'])->name('banners.store');

        Route::delete('delete/{banner}', [BannerController::class, 'delete'])->name('banners.destroy');
    });

    Route::resource('blogs', BlogController::class);


    
});


