<?php

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController; // للواجهة العامة فقط
use App\Http\Controllers\Dashboard\ProductController as DashboardProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| هذا الملف يحتوي على جميع الراوتات الخاصة بالموقع ولوحة التحكم في صفحة واحدة.
|--------------------------------------------------------------------------
*/

// 🏠 الصفحة الرئيسية


// 👇 هذا هو الراوت الجديد للصفحة الرئيسية
Route::get('/', function () {
    return view('public.homepage');
})->name('homepage');

// 🌐 تغيير اللغة
Route::get('lang/{locale}', function ($locale) {
    if (! in_array($locale, ['ar', 'en'])) {
        abort(400);
    }

    Session::put('locale', $locale);
    App::setLocale($locale);

    return redirect()->back();
})->name('lang.switch');

// 🔐 راوتات المصادقة
Route::get('/login',    [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login',   [AuthController::class, 'login']);
Route::post('/logout',  [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// 🛍️ واجهة عامة للمنتجات (إن وجدت)
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

// 🧭 راوتات لوحة التحكم - منتجات
Route::get('/dashboard/products',         [DashboardProductController::class, 'index'])->name('dashboard.products.index');
Route::get('/dashboard/products/create',  [DashboardProductController::class, 'create'])->name('dashboard.products.create');
Route::post('/dashboard/products',        [DashboardProductController::class, 'store'])->name('dashboard.products.store');

use App\Models\Product;


Route::get('/products', function () {
    $products = Product::all();
    return view('public.products.index', compact('products'));
})->name('public.products.index');


Route::post('/register', [RegisterController::class, 'register'])->name('register');
