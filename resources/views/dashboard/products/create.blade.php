@extends('components.layout.dashboard-layout')


@section('content')
    <h4 class="mb-4">📝 إضافة منتج جديد</h4>

    <form action="{{ route('dashboard.products.store') }}" method="POST" enctype="multipart/form-data">

        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">اسم المنتج</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">وصف المنتج</label>
            <input type="text" id="description" name="description" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">السعر</label>
            <input type="number" id="price" name="price" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">تحميل صورة المنتج</label>
            <input type="file" id="image" name="image" class="form-control" accept="image/*" required>
        </div>

        <button type="submit" class="btn btn-success">💾 حفظ المنتج</button>
    </form>
@endsection
