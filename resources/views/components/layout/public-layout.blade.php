<!-- resources/views/components/layout/public-layout.blade.php -->
<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sally-Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- 🧵 ملفات CSS العامة -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <li class="nav-item">
        <a href="{{ route('cart.view') }}" class="nav-link position-relative">
            🛒 السلة
            @php
                $cart = session('cart', []);
                $count = array_sum(array_column($cart, 'quantity'));
            @endphp
            @if ($count > 0)
                <span class="badge bg-danger position-absolute top-0 start-100 translate-middle">
                    {{ $count }}
                </span>
            @endif
        </a>
    </li>

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
