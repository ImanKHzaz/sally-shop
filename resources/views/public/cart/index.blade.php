@extends('components.layout.public-layout')

@section('content')
    <div class="container py-5">
        <h2 class="mb-4 text-center">🛒 سلة التسوق</h2>

        @if (count($cart))
            <table class="table table-bordered table-striped">
                <thead class="table-light">
                    <tr>
                        <th scope="col">المنتج</th>
                        <th scope="col">السعر</th>
                        <th scope="col">الكمية</th>
                        <th scope="col">الإجمالي</th>
                        <th scope="col">إزالة</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cart as $id => $item)
                        <tr>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['price'] }} ل.س</td>
                            <td>{{ $item['quantity'] }}</td>
                            <td>{{ $item['price'] * $item['quantity'] }} ل.س</td>
                            <td>
                                <form action="{{ route('cart.remove', $id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">🗑️</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="text-end">
                <a href="{{ route('checkout') }}" class="btn btn-success">✅ إتمام الطلب</a>

            </div>
        @else
            <p class="text-center text-muted">السلة فارغة الآن. أضيفي بعض المنتجات أولاً 🎯</p>
        @endif
    </div>
@endsection
