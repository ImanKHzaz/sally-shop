@extends('components.layout.dashboard-layout')

@section('content')
    <div class="container">
        <h1 class="mb-4 fw-bold">📊 لوحة التحكم</h1>

        <!-- ✅ أزرار العمليات -->
        <div class="d-flex gap-3 flex-wrap mb-4">
            <a href="{{ route('dashboard.products.create') }}" class="btn btn-primary">
                🛒 إضافة منتج جديد
            </a>
            <a href="{{ route('dashboard.users.create') }}" class="btn btn-success">
                👤 إضافة مستخدم جديد
            </a>
        </div>

        <!-- ✅ بطاقات الإحصائيات -->
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title text-primary">المنتجات</h5>
                        <p class="fs-2 fw-bold text-primary">{{ $productsCount }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title text-success">المستخدمون</h5>
                        <p class="fs-2 fw-bold text-success">{{ $usersCount }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title text-warning">الطلبات النشطة</h5>
                        <p class="fs-2 fw-bold text-warning">{{ $ordersCount }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
