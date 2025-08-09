@extends('components.layout.dashboard-layout')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>📦 قائمة المنتجات</h4>
        <a href="{{ route('dashboard.products.create') }}" class="btn btn-primary">
            ➕ إضافة منتج جديد</a>
    </div>

    <table class="table table-bordered text-center">
        <thead class="table-secondary">
            <tr>
                <th>الصورة</th>
                <th>الوصف</th>
                <th>السعر</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td><img src="{{ asset('images/' . $product->image) }}" alt="صورة المنتج" width="80"></td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->price }} $</td>
                    <td>
                        <a href="{{ route('dashboard.products.edit', $product->id) }}"
                            class="btn btn-sm btn-warning">تعديل</a>

                        <a href="#" class="btn btn-sm btn-danger">حذف</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
