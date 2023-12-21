<?php

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\IsAuthenticatedMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');



//session
Route::get('/login_page', [\App\Http\Controllers\LoginController::class, 'showLoginForm'])->name('login.page');
Route::get('/register_page', [\App\Http\Controllers\RegisterController::class, 'showRegisterForm'])->name('register.page');
Route::post('/login', [\App\Http\Controllers\LoginController::class, 'store'])->name('login.in');
Route::post('/register', [\App\Http\Controllers\RegisterController::class, 'store'])->name('register.in');
Route::get('/shop', [\App\Http\Controllers\HomeController::class, 'shop'])->name('shop');
Route::get('/product/{id}', [\App\Http\Controllers\HomeController::class, 'show_product'])->name('product');


//auth
Route::middleware([IsAuthenticatedMiddleware::class])->group(function () {
    Route::get('/logout', [\App\Http\Controllers\LoginController::class, 'destroy'])->name('logout');
    Route::get('/cart', [\App\Http\Controllers\CartController::class, 'index'])->name('cart');
    Route::post('/add_cart/{id}', [\App\Http\Controllers\CartController::class, 'add_cart'])->name('add.cart');
    Route::delete('/add_cart/{id}', [\App\Http\Controllers\CartController::class, 'add_cart'])->name('add.cart');
    Route::delete('/delete_cart/{id}', [\App\Http\Controllers\CartController::class, 'delete_from_cart'])->name('delete.from.cart');

    //admin
    Route::middleware([AdminMiddleware::class])->group(function () {
        Route::get('/admin/home', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin.home');
        Route::get('/category', [\App\Http\Controllers\AdminController::class, 'showAddCategory'])->name('add.category.show');
        Route::get('/product_add', [\App\Http\Controllers\AdminController::class, 'showAddProduct'])->name('add.product.show');
        Route::get('/product/admin/show', [\App\Http\Controllers\AdminController::class, 'showProduct'])->name('product.show');
        Route::post('/add_category', [\App\Http\Controllers\AdminController::class, 'add_category'])->name('add.category');
        Route::get('/delete_category/{id}', [\App\Http\Controllers\AdminController::class, 'delete_category']);
        Route::post('/add_product', [\App\Http\Controllers\AdminController::class, 'add_product'])->name('add.product');
        Route::delete('/delete/product/{id}', [\App\Http\Controllers\AdminController::class, 'deleteProduct'])->name('delete.product');
        Route::get('/update_product/{id}', [\App\Http\Controllers\AdminController::class, 'update_product']);
        Route::post('/update_product_confirm/{id}', [\App\Http\Controllers\AdminController::class, 'update_product_confirm']);
    });
});


