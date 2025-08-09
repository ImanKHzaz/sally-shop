<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <title>لوحة التحكم - Sally Shop</title>

    <!-- ✅ Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .sidebar {
            background-color: #343a40;
            color: #fff;
            height: 100vh;
            padding-top: 20px;
        }

        .sidebar a {
            color: #fff;
            padding: 10px 20px;
            display: block;
            text-decoration: none;
        }

        .sidebar a:hover {
            background-color: #495057;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- ✅ القائمة الجانبية -->
            <nav class="col-md-3 col-lg-2 sidebar">
                <h5 class="text-center mb-4">لوحة التحكم</h5>
                <a href="{{ route('dashboard.index') }}">🏠 الرئيسية</a>
                <a href="{{ route('dashboard.products.index') }}">🛍️ المنتجات</a>
                <a href="{{ route('dashboard.users.index') }}">👥 المستخدمون</a>
                <a href="{{ route('dashboard.orders.index') }}">📦 الطلبات</a>
            </nav>

            <!-- ✅ المحتوى الرئيسي -->
            <main class="col-md-9 col-lg-10 py-4">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- ✅ Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
