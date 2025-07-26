<!-- resources/views/components/layout/public-layout.blade.php -->
<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sally-Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- 🧵 ملفات CSS العامة -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>

    <!-- 🎀 رأس الصفحة -->
    <header class="bg-light py-3 shadow-sm">
        <div class="container text-center">
            <h2 class="m-0">Sally-Shop</h2>
        </div>
    </header>

    <!-- 🎯 محتوى الصفحة -->
    <main class="py-4">
        @yield('content')

    </main>



    <!-- 🌙 التذييل -->
    <footer class="bg-dark text-white py-3 mt-auto">
        <div class="container text-center">
            <small>© {{ date('Y') }} متجر Sally-Shop. جميع الحقوق محفوظة.</small>
        </div>
    </footer>

    <!-- 📦 ملفات JavaScript إذا لزم الأمر -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
