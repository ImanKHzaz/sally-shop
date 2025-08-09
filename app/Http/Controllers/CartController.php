<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    // باستخدام Route Model Binding
    public function add(Request $request, Product $product)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity']++;
        } else {
            $cart[$product->id] = [
                'name'     => $product->name,
                'price'    => $product->price,
                'image'    => $product->image,
                'quantity' => 1,
            ];
        }

        session()->put('cart', $cart);

        return back()->with('success', 'تمت إضافة المنتج إلى السلة.');
    }

    // إن اخترتِ {id} بدل {product} فاستخدمي هذه الصيغة:
    /*
    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        // نفس منطق الإضافة أعلاه...
    }
    */




    public function view()
    {
        $cart = session()->get('cart', []);
        return view('public.cart.index', compact('cart'));
    }


    public function remove($id)
    {
        $cart = session()->get('cart', []);
        unset($cart[$id]);
        session()->put('cart', $cart);

        return redirect()->route('cart.view')->with('success', 'تم حذف المنتج من السلة');
    }
}
