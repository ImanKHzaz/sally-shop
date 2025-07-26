<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();
        return view('dashboard.products.index', compact('products'));
    }

    public function create()
    {
        return view('dashboard.products.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'description' => 'required|string|max:255',
            'price'       => 'required|numeric|min:0',
            'image'       => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // حفظ الصورة في مجلد public/images
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        // إنشاء المنتج
        Product::create([
            'description' => $validated['description'],
            'price'       => $validated['price'],
            'image'       => $imageName,
        ]);

        return redirect()->route('products.index')->with('success', '✔️ تم حفظ المنتج بنجاح');
    }
}
