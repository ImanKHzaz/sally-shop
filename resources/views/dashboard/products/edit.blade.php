@extends('components.layout.dashboard-layout')

@section('content')
    <h4 class="mb-4">📝 تعديل المنتج: {{ $product->name }}</h4>

    <form action="{{ route('dashboard.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">اسم المنتج</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ $product->name }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">وصف المنتج</label>
            <input type="text" id="description" name="description" class="form-control"
                value="{{ $product->description }}" required>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">السعر</label>
            <input type="number" id="price" name="price" class="form-control" value="{{ $product->price }}" required>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">تحديث صورة المنتج (اختياري)</label>
            <input type="file" id="image" name="image" class="form-control" accept="image/*">
            <small class="text-muted">الصورة الحالية:</small><br>
            <img src="{{ asset('images/' . $product->image) }}" alt="صورة المنتج" width="100">
        </div>

        <button type="submit" class="btn btn-success">🔄 تحديث المنتج</button>
    </form>
@endsection
