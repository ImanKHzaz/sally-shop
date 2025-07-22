<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="UTF-8">
    <title>sally-shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar بسيطة -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">

            <a class="navbar-brand" href="/">sally-shop</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    @auth
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <button class="btn btn-link nav-link" type="submit">تسجيل الخروج</button>
                                <div class="d-flex">
                                    <a href="{{ route('lang.switch', 'ar') }}"
                                        class="btn btn-outline-secondary me-1">العربية</a>
                                    <a href="{{ route('lang.switch', 'en') }}" class="btn btn-outline-secondary">English</a>
                                </div>
                                <div class="d-flex">
                                    <a href="{{ route('lang.switch', 'ar') }}"
                                        class="btn btn-outline-secondary me-2">العربية</a>
                                    <a href="{{ route('lang.switch', 'en') }}" class="btn btn-outline-secondary">English</a>
                                </div>

                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">دخول</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">تسجيل</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>

    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
