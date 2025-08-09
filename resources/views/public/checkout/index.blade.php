@extends('components.layout.public-layout')

@section('title', 'إتمام الطلب')

@section('content')
    <div class="container my-5">
        <h2 class="mb-4">📦 ملخص الطلب</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if (empty($cart))
            <div class="alert alert-warning">السلة فارغة. أضيفي منتجات لإتمام الطلب.</div>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>المنتج</th>
                        <th>السعر</th>
                        <th>الكمية</th>
                        <th>الإجمالي</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cart as $id => $item)
                        <tr>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ number_format($item['price'], 0) }} ل.س</td>
                            <td>{{ $item['quantity'] }}</td>
                            <td>{{ number_format($item['price'] * $item['quantity'], 0) }} ل.س</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <hr>

            <h4>📋 بيانات العميل</h4>
            <form action="{{ route('order.store') }}" method="POST">
                @csrf

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="name" class="form-label">الاسم الكامل</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="phone" class="form-label">رقم الهاتف</label>

                        <input type="tel" name="phone" class="form-control" value="{{ old('phone') }}" required
                            pattern="^09[3-9][0-9]{7}$" title="أدخل رقم هاتف سوري يبدأ بـ 09 ويحتوي على 10 أرقام"
                            oninput="this.value=this.value.replace(/[^0-9]/g,'');">


                    </div>
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">العنوان الكامل</label>
                    <textarea name="address" class="form-control" rows="2" required>{{ old('address') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="notes" class="form-label">ملاحظات إضافية (اختياري)</label>
                    <textarea name="notes" class="form-control" rows="2">{{ old('notes') }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">✅ تأكيد الطلب</button>
            </form>
        @endif
    </div>
@endsection
