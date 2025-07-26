@extends('components.layout.public-layout')

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
                            <div class="card-footer text-muted">
                                السعر: {{ $product->price }} ل.س
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
