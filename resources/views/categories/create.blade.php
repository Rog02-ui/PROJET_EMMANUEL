{{-- resources/views/categories/create.blade.php --}}
@extends('layouts.app')

@section('title', 'Créer une nouvelle catégorie')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Créer une nouvelle catégorie</h1>

        {{-- Affichage des erreurs de validation --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Formulaire pour créer une nouvelle catégorie --}}
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nom de la catégorie :</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description de la catégorie :</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{ old('description') }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Créer</button>
        </form>
    </div>
@endsection
