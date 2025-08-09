<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

// ✅ Controllers
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController; // كنترولر المنتجات العام

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
