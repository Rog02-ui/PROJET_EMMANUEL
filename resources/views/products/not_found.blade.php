<!-- resources/views/products/not_found.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Aucun produit trouvé pour {{ $product }} dans la catégorie {{ $category }}</h1>
@endsection
