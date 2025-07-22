@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>{{ __('Login') }}</h2>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-3">
            <label>البريد الإلكتروني</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>كلمة المرور</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">دخول</button>
        <a href="{{ route('register') }}" class="btn btn-link">ليس لديك حساب؟</a>
    </form>
</div>
@endsection
