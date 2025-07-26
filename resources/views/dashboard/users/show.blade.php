@extends('components.layout.dashboard-layout')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-xl font-semibold mb-4">تفاصيل المستخدم</h1>

        <div class="bg-white p-4 rounded shadow">
            <p><strong>الاسم:</strong> {{ $user->name }}</p>
            <p><strong>البريد الإلكتروني:</strong> {{ $user->email }}</p>
            <p><strong>تاريخ الإنشاء:</strong> {{ $user->created_at->format('Y-m-d') }}</p>
        </div>

        <a href="{{ route('dashboard.users.index') }}" class="mt-4 inline-block text-blue-600 hover:underline">
            ⬅️ العودة إلى القائمة
        </a>
    </div>
@endsection
