@extends('components.layout.dashboard-layout')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold mb-6">لوحة التحكم</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            <!-- زر إضافة منتج -->
            <a href="{{ route('dashboard.products.create') }}"
                class="bg-blue-600 text-white py-3 px-5 rounded-lg shadow hover:bg-blue-700 transition">
                🛒 إضافة منتج جديد
            </a>

            <!-- زر إضافة مستخدم -->
            <a href="{{ route('dashboard.users.create') }}"
                class="bg-green-600 text-white py-3 px-5 rounded-lg shadow hover:bg-green-700 transition">
                👤 إضافة مستخدم جديد
            </a>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="bg-white p-6 rounded shadow">
                    <h2 class="text-xl font-bold">المنتجات</h2>
                    <p class="text-3xl">{{ $productsCount }}</p>
                </div>
                <div class="bg-white p-6 rounded shadow">
                    <h2 class="text-xl font-bold">المستخدمون</h2>
                    <p class="text-3xl">{{ $usersCount }}</p>
                </div>
                <div class="bg-white p-6 rounded shadow">
                    <h2 class="text-xl font-bold">الطلبات النشطة</h2>
                    <p class="text-3xl">{{ $ordersCount }}</p>
                </div>
            </div>

        </div>
    </div>
@endsection
