<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();
        return view('dashboard.products.index', compact('products')); // مهم
    }

    public function create()
    {
        return view('dashboard.products.create');
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'price'       => 'required|numeric|min:0',
            'image'       => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);


        // حفظ الصورة في مجلد public/images
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        // إنشاء المنتج
        Product::create([
            'name'        => $validated['name'],
            'description' => $validated['description'],
            'price'       => $validated['price'],
            'image'       => $imageName,
        ]);


        return redirect()->route('dashboard.products.index')->with('success', '✔️ تم حفظ المنتج بنجاح');
    }

    public function edit(Product $product)
    {
        return view('dashboard.products.edit', compact('product'));
    }




    public function update(Request $request, Product $product)
    {
        // ✅ التحقق من البيانات
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // ✅ تحديث البيانات الأساسية
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;

        // ✅ التحقق من رفع صورة جديدة
        if ($request->hasFile('image')) {
            // حذف الصورة القديمة إذا كانت موجودة
            $oldPath = public_path('images/' . $product->image);
            if (File::exists($oldPath)) {
                File::delete($oldPath);
            }

            // حفظ الصورة الجديدة
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);

            $product->image = $imageName;
        }

        // ✅ حفظ التغييرات
        $product->save();

        // ✅ إعادة التوجيه مع رسالة نجاح
        return redirect()->route('dashboard.products.index')->with('success', 'تم تحديث المنتج بنجاح ✅');
    }
}
