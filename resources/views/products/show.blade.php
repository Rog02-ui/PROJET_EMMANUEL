<!-- resources/views/products/show.blade.php -->
@extends('layouts.app')

@section('title', $product->name)

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <!-- Image du produit -->
            <img src="{{ asset($product->image_url) }}" class="img-fluid" alt="{{ $product->name }}">
        </div>
        <div class="col-md-6">
            <h2>{{ $product->name }}</h2>
            <p>{{ $product->description }}</p>
            <h4>{{ number_format($product->price, 0, ',', ' ') }} FCFA</h4>

            <!-- Formulaire d'ajout au panier -->
            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-shopping-cart"></i> Ajouter au panier
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
