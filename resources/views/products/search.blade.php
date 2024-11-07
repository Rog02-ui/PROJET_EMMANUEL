@extends('layouts.app')

@section('title', 'Résultats de recherche')

@section('content')
<div class="container mt-5">
    <h1>Résultats de la recherche</h1>

    @if($products->isEmpty())
        <p>Aucun produit trouvé.</p>
    @else
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-4">
                    <div class="card mb-3">
                        <img src="{{ asset($product->image_url) }}" class="card-img-top" alt="{{ $product->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ number_format($product->price, 0, ',', ' ') }} FCFA</p>
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">Voir détails</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
