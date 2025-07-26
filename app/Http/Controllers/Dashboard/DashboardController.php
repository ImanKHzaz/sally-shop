<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;

class DashboardController extends Controller
{
    /**
     * عرض إحصائيات لوحة التحكم.
     */
    public function index()
    {
        $productsCount = Product::count();
        $usersCount = User::count();
        $ordersCount = Order::where('status', 'pending')->count();

        return view('dashboard.index', compact('productsCount', 'usersCount', 'ordersCount'));
    }
}
