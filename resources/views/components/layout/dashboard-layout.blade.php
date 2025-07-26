<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <title>لوحة التحكم - Sally-Shop</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- يمكنكِ إضافة تنسيقات خاصة بلوحة التحكم هنا -->
    <style>
        body {
            background-color: #f5f5f5;
            font-family: "Segoe UI", sans-serif;
        }

        .sidebar {
            background-color: #343a40;
            min-width: 200px;
            color: #fff;
            height: 100vh;
            padding-top: 1rem;
        }

        .sidebar a {
            display: block;
            color: #fff;
            padding: 10px 16px;
            text-decoration: none;
        }

        .sidebar a:hover {
            background-color: #495057;
        }
    </style>
</head>

<body>
    <div class="d-flex">
        <!-- ✅ القائمة الجانبية -->
        <div class="sidebar">
            <h5 class="text-center">لوحة التحكم</h5>
            <a href="{{ route('dashboard.index') }}">🏠 الرئيسية</a>
            <a href="{{ route('dashboard.products.index') }}">🛍️ المنتجات</a>
            <a href="{{ route('dashboard.users.index') }}">👥 المستخدمون</a>
            <a href="{{ route('dashboard.orders.index') }}">📦 الطلبات</a>
        </div>

        <!-- ✅ المحتوى الرئيسي -->
        <main class="flex-grow-1 p-4">
            @yield('content')
        </main>
    </div>
</body>

</html>
