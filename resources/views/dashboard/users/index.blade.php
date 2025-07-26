@extends('components.layout.dashboard-layout')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-xl font-semibold mb-4">قائمة المستخدمين</h1>

        <a href="{{ route('dashboard.users.create') }}"
            class="bg-blue-600 text-white py-2 px-4 rounded mb-4 inline-block hover:bg-blue-700">
            ➕ إنشاء مستخدم جديد
        </a>

        <table class="w-full bg-white border rounded shadow">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="py-2 px-4">الاسم</th>
                    <th class="py-2 px-4">البريد الإلكتروني</th>
                    <th class="py-2 px-4">الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="border-t">
                        <td class="py-2 px-4">{{ $user->name }}</td>
                        <td class="py-2 px-4">{{ $user->email }}</td>
                        <td class="py-2 px-4 flex gap-2">
                            <a href="{{ route('dashboard.users.show', $user->id) }}"
                                class="text-blue-600 hover:underline">عرض</a>
                            <form method="POST" action="{{ route('dashboard.users.destroy', $user->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline"
                                    onclick="return confirm('هل أنتِ متأكدة من الحذف؟')">
                                    حذف
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">{{ $users->links() }}</div>
    </div>
@endsection
