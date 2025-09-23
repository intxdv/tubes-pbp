@extends('layouts.app')

@section('content')
    <h1>Welcome to the Marketplace!</h1>
    <p>Check out our latest products:</p>

    <div class="products">
        @foreach(App\Models\Product::all() as $product)
            <div class="product-card">
                <img src="{{ $product->image ? asset('images/' . $product->image) : 'https://via.placeholder.com/100' }}" 
                     alt="{{ $product->name }}">
                <div class="product-info">
                    <h3>{{ $product->name }}</h3>
                    <p>Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    <p>Stock: {{ $product->stock }}</p>
                    <p>{{ $product->description }}</p>
                </div>
            </div>
        @endforeach
    </div>
@endsection
