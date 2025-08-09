@extends('components.layout.public-layout')
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@section('content')
    <div class="container py-5">
        <h2 class="mb-4 text-center">🛍️ قائمة المنتجات</h2>

        @if ($products->count())
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                @foreach ($products as $product)
                    <div class="col">
                        <div class="card h-100">
                            <img src="{{ asset('images/' . $product->image) }}" class="card-img-top"
                                alt="{{ $product->name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">{{ $product->description }}</p>
                            </div>
                            <div class="card-footer d-flex justify-content-between align-items-center">
                                <span>السعر: {{ $product->price }} ل.س</span>
                                <div>
                                    <a href="{{ route('products.show', $product->id) }}"
                                        class="btn btn-sm btn-outline-primary me-2">
                                        تفاصيل
                                    </a>
                                    <form action="{{ route('cart.add', $product->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-success">
                                            إضافة إلى السلة
                                        </button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-center text-muted">لا توجد منتجات حاليًا.</p>
        @endif
    </div>
@endsection
