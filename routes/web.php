<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BlogController;



Route::get('/', function () {
    return view('welcome');
});


Route::prefix('admin')->group(function () {

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


