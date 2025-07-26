<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{

    public function run()
    {
        Product::insert([
            [
                'name' => 'قلم ذكي',
                'description' => 'قلم إلكتروني قابل للشحن يدعم الكتابة على الأجهزة الذكية.',
                'price' => 25.99,
                'image' => 'pen.jpg'
            ],
            [
                'name' => 'دفتر ملاحظات سحابي',
                'description' => 'دفتر مزوّد برقاقة تخزين تزامنية مع السحابة.',
                'price' => 59.50,
                'image' => 'notebook.jpg'
            ],
            [
                'name' => 'حقيبة عمل ذكية',
                'description' => 'حقيبة مقاومة للماء ومزوّدة بمدخل USB لشحن الأجهزة.',
                'price' => 129.00,
                'image' => 'bag.jpg'
            ]
        ]);
    }
}
