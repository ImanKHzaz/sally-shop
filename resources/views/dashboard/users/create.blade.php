@extends('components.layout.dashboard-layout')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-xl font-semibold mb-4">إنشاء مستخدم جديد</h1>

        <form method="POST" action="{{ route('dashboard.users.store') }}">
            @csrf

            <div class="mb-4">
                <label class="block mb-1">الاسم</label>
                <input type="text" name="name" class="w-full border rounded px-3 py-2" value="{{ old('name') }}"
                    required>
            </div>

            <div class="mb-4">
                <label class="block mb-1">البريد الإلكتروني</label>
                <input type="email" name="email" class="w-full border rounded px-3 py-2" value="{{ old('email') }}"
                    required>
            </div>

            <div class="mb-4">
                <label class="block mb-1">كلمة المرور</label>
                <input type="password" name="password" class="w-full border rounded px-3 py-2" required>
            </div>

            <div class="mb-4">
                <label class="block mb-1">تأكيد كلمة المرور</label>
                <input type="password" name="password_confirmation" class="w-full border rounded px-3 py-2" required>
            </div>

            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                حفظ المستخدم
            </button>
        </form>
    </div>
@endsection
