@extends('components.layout.public-layout')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <img src="{{ asset('images/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                    <div class="card-body">
                        <h3 class="card-title">{{ $product->name }}</h3>
                        <p class="card-text">{{ $product->description }}</p>
                        <p class="card-text"><strong>السعر:</strong> {{ $product->price }} ل.س</p>
                        <form action="{{ route('cart.add', $product->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success">🛒 إضافة إلى السلة</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
