<?php

use Illuminate\Support\Facades\Route;

// ✅ Controllers
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\OrderController;
use App\Http\Controllers\Dashboard\ProductController as DashboardProductController;

// ✅ كل راوتات لوحة التحكم داخل مجموعة واحدة
Route::middleware(['auth'])->prefix('dashboard')->name('dashboard.')->group(function () {

    // 🏠 الصفحة الرئيسية للوحة التحكم
    Route::get('/', [DashboardController::class, 'index'])->name('index');

    // الصفحة الإضافية عبر HomeController
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // 👥 المستخدمون
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    // يمكنكِ إعادة تفعيل show وdestroy حسب الحاجة
    // Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
    // Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

    // 📦 الطلبات
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    // Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');

    // 🛒 المنتجات (CRUD كامل في لوحة التحكم)
    Route::get('/products', [DashboardProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [DashboardProductController::class, 'create'])->name('products.create');
    Route::post('/products', [DashboardProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}/edit', [DashboardProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [DashboardProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [DashboardProductController::class, 'destroy'])->name('products.destroy');
});
