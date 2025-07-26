<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // عرض كل الطلبات
    public function index()
    {
        $orders = Order::with('user')->latest()->paginate(10);
        return view('dashboard.orders.index', compact('orders'));
    }

    // عرض تفاصيل طلب واحد
    public function show(Order $order)
    {
        $order->load('user', 'items.product'); // مثال لتحميل العلاقات
        return view('dashboard.orders.show', compact('order'));
    }

    // حذف الطلب
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('dashboard.orders.index')
            ->with('success', 'تم حذف الطلب بنجاح');
    }
}
