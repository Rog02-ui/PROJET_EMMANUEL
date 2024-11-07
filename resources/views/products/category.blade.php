<!-- resources/views/products/category.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Produits pour la catégorie {{ $category }}</h1>
    <div class="container">
        @foreach($products as $product)
            <div class="product-card">
                <img src="{{ asset($product->image_url) }}" alt="{{ $product->name }}">
                <h3>{{ $product->name }}</h3>
                <p>{{ $product->price }} FCFA</p>
            </div>
        @endforeach
    </div>
@endsection
