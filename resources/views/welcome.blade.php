@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">{{ __('Welcome to sally-shop') }} 🎉</h1>

        <!-- ✅ زر تغيير اللغة -->
        <div class="mb-3">
            <a href="{{ route('lang.switch', 'ar') }}" class="btn btn-outline-secondary me-2">العربية</a>
            <a href="{{ route('lang.switch', 'en') }}" class="btn btn-outline-secondary">English</a>
        </div>

        @auth
            <p>{{ __('Hello') }} {{ Auth::user()->name }} 👋</p>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-danger">{{ __('Logout') }}</button>
            </form>
        @else
            <a href="{{ route('login') }}" class="btn btn-primary">{{ __('Login') }}</a>
            <a href="{{ route('register') }}" class="btn btn-success">{{ __('Register') }}</a>
        @endauth

        <!-- ✅ زر عرض المنتجات للضيوف والمستخدمين -->
        <div class="mt-3">
            <a href="{{ url('/products') }}" class="btn btn-outline-info">{{ __('Browse Products') }}</a>
        </div>
    </div>
@endsection
