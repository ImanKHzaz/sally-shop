@extends('components.layout.dashboard-layout')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-xl font-semibold mb-4">قائمة الطلبات</h1>

        <table class="w-full bg-white border rounded shadow">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="py-2 px-4">رقم الطلب</th>
                    <th class="py-2 px-4">المستخدم</th>
                    <th class="py-2 px-4">السعر الإجمالي</th>
                    <th class="py-2 px-4">طريقة الدفع</th>
                    <th class="py-2 px-4">الحالة</th>
                    <th class="py-2 px-4">الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr class="border-t">
                        <td class="py-2 px-4">{{ $order->id }}</td>
                        <td class="py-2 px-4">{{ $order->user->name }}</td>
                        <td class="py-2 px-4">{{ number_format($order->total_price, 2) }} $</td>
                        <td class="py-2 px-4">{{ $order->payment_method }}</td>
                        <td class="py-2 px-4">
                            <span class="px-2 py-1 rounded-full bg-yellow-200 text-yellow-800">
                                {{ ucfirst($order->status) }}
                            </span>
                        </td>
                        <td class="py-2 px-4 flex gap-2">
                            <a href="{{ route('dashboard.orders.show', $order->id) }}"
                                class="text-blue-600 hover:underline">عرض</a>

                            <form method="POST" action="{{ route('dashboard.orders.destroy', $order->id) }}">
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

        <div class="mt-4">{{ $orders->links() }}</div>
    </div>
@endsection
