<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('public.checkout.index', compact('cart'));
    }




    public function store(Request $request)
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()
                ->route('cart.view')
                ->with('error', 'السلة فارغة. أضيفي منتجات قبل إتمام الطلب.');
        }

        $data = $request->validate([
            'name'    => ['required', 'string', 'min:2', 'max:150'],
            'phone' => ['required', 'regex:/^09[3-9]\d{7}$/', 'string'],
            'address' => ['required', 'string', 'min:5', 'max:255'],
            'notes'   => ['nullable', 'string', 'max:1000'],
        ]);

        $subtotal = collect($cart)->reduce(function ($sum, $item) {
            $price = (float)($item['price'] ?? 0);
            $qty   = (int)($item['quantity'] ?? 0);
            return $sum + ($price * $qty);
        }, 0.0);

        $shipping = 0.0;
        $total    = $subtotal + $shipping;

        DB::beginTransaction();

        try {
            $order = \App\Models\Order::create([
                'customer_name'    => $data['name'],
                'customer_phone'   => $data['phone'],
                'customer_address' => $data['address'],
                'notes'            => $data['notes'] ?? null,
                'subtotal'         => $subtotal,
                'shipping'         => $shipping,
                'total'            => $total,
                'status'           => 'pending',
                'currency'         => 'SYP',
            ]);

            foreach ($cart as $productId => $item) {
                $price = (float)($item['price'] ?? 0);
                $qty   = (int)($item['quantity'] ?? 0);

                \App\Models\OrderItem::create([
                    'order_id'   => $order->id,
                    'product_id' => is_numeric($productId) ? (int)$productId : null,
                    'name'       => $item['name'] ?? 'منتج',
                    'price'      => $price,
                    'quantity'   => $qty,
                    'total'      => $price * $qty,
                ]);
            }

            DB::commit();
            session()->forget('cart');

            return redirect()
                ->route('checkout')
                ->with('success', 'تم إنشاء الطلب بنجاح! رقم الطلب: ' . $order->id);
        } catch (\Throwable $e) {
            DB::rollBack();
            report($e);
            return back()
                ->withInput()
                ->with('error', 'حدث خطأ أثناء حفظ الطلب. حاولي مجددًا.');
        }
    }
}
