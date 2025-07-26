<!-- resources/views/components/layout/auth-layout.blade.php -->
<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <title>تسجيل الدخول - Sally-Shop</title>

    <!-- ✅ تضمين Bootstrap عبر CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- ✅ تضمين ملف CSS الخاص بك -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="bg-light d-flex justify-content-center align-items-center vh-100">

    <!-- ✅ هنا يتم إدراج المحتوى الديناميكي من @section('content') -->
        <main class="w-100" style="max-width: 400px;">
            @yield('content')
        </main>
        <style>
            body {
                font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
                color: #333;
            }

            form {
                background: #fff;
                padding: 2rem;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
            }
        </style>



    </body>

    </html>
