@extends('components.layout.public-layout')

@section('content')
    <div class="container py-5">
        <div class="text-center mb-5">
            <h1>🎉 أهلاً بك في متجر Sally-Shop</h1>
            <p class="lead mt-3">استعرض المنتجات، وابدأ التسوّق الآن!</p>
        </div>
        @auth
            <div class="mb-4 text-center">
                <h5 class="text-muted">👤 مسجّلة الدخول كـ {{ Auth::user()->name }}</h5>
            </div>
        @endauth

        <!-- روابط الإدارة -->
        @auth
            @if (in_array(Auth::user()->role, ['admin', 'manager']))
                <div class="text-center mb-4">
                    <a href="{{ route('dashboard.index') }}" class="btn btn-primary">
                        لوحة التحكم
                    </a>
                </div>
            @endif
        @endauth

        <!-- أزرار التنقل -->
        <div class="d-flex justify-content-center gap-3 flex-wrap">
            <a href="{{ route('public.products.index') }}" class="btn btn-outline-success">
                عرض المنتجات
            </a>

            @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger">
                        تسجيل الخروج
                    </button>
                </form>
            @endauth
        </div>
    </div>
@endsection
