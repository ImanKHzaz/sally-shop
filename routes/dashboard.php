<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Dashboard\HomeController;

Route::middleware(['auth'])->prefix('dashboard')->name('dashboard.')->group(function () {

    // الصفحة الرئيسية للوحة التحكم
    Route::get('/', [DashboardController::class, 'index'])->name('index');

    Route::prefix('dashboard')->name('dashboard.')->middleware('auth')->group(function () {
        Route::get('/', [HomeController::class, 'index'])->name('index');
    });

    // إدارة المستخدمين
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    //Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
    //Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

    // إدارة الطلبات
    //Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    //Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');

    // إدارة المنتجات
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');


    // داخل routes/dashboard.php
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
});
