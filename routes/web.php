<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
// ✅ Controllers
use App\Http\Controllers\CartController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController; // كنترولر المنتجات العام
use App\Http\Controllers\OrderController;

// 🏠 الصفحة الرئيسية
Route::get('/', fn() => view('public.homepage'))->name('homepage');

// 🌐 تغيير اللغة
Route::get('lang/{locale}', function ($locale) {
    if (!in_array($locale, ['ar', 'en'])) abort(400);
    Session::put('locale', $locale);
    App::setLocale($locale);
    return redirect()->back();
})->name('lang.switch');

// 🔐 المصادقة
Route::get('/login',    [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login',   [AuthController::class, 'login']);
Route::post('/logout',  [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/register', [RegisterController::class, 'register'])->name('register.post'); // للتأكد من تمييز الراوت

// 🛍️ واجهة المنتجات (عرض فقط)
use App\Models\Product;

Route::get('/products', function () {
    $products = Product::all();
    return view('public.products.index', compact('products'));
})->name('public.products.index');

// ✅ إن أردتِ استخدام Controller بدلاً من Closure:
Route::get('/products/show', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');


Route::get('/cart', [CartController::class, 'view'])->name('cart.view');


Route::get('/cart', [CartController::class, 'view'])->name('cart.view');

Route::post('/cart/{product}', [CartController::class, 'add'])->name('cart.add');


Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

Route::get('/checkout', [OrderController::class, 'index'])->name('checkout');


Route::get('/checkout', [OrderController::class, 'index'])->name('checkout');


Route::post('/orders', [OrderController::class, 'store'])->name('order.store');
