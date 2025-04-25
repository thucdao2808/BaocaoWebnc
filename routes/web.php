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
use App\Http\Controllers\CustomCategoryController; 
use App\Http\Controllers\ProductCartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;




Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth',isMember::class])->prefix('home')->group(function() {

    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::get('product/{product}', [HomeController::class, 'show'])->name('product');

    Route::get('checkout/{product}', [CheckoutController::class, 'show'])->name('checkout');

    Route::post('checkout/{product}', [CheckoutController::class, 'checkout'])->name('checkout.handle');

    Route::get('vnpay/return', [CheckoutController::class, 'vnpayReturn'])->name('vnpay.return');

    Route::get('order', [OrderController::class, 'index'])->name('order');
});


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

Route::prefix('custom')->group(function () {
    
    // Trang chính của category
    Route::get('/category', [CustomCategoryController::class, 'index'])->name('custom.category.index');

    // Danh sách sản phẩm theo category
    Route::get('/category/{id}', [CustomCategoryController::class, 'listproduct'])->name('category.product');

    // Show cart cho user
    Route::get('/show-CartProducts', [ProductCartController::class, 'index'])->name('showCart');

    // Thêm sản phẩm vào giỏ hàng
    Route::get('/products/add-to-cart/{id}', [CustomCategoryController::class, 'addToCart'])->name('addToCart');

    // Cập nhật giỏ hàng (AJAX)
    Route::post('/cart/update', [ProductCartController::class, 'updateCart'])->name('cart.update');

    // Xoá sản phẩm khỏi giỏ hàng (AJAX)
    Route::get('/delete/cart', [ProductCartController::class, 'deleteCart'])->name('cart.delete');
});