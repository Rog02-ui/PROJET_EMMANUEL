{{-- resources/views/categories/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Liste des catégories')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Liste des catégories</h1>

        @if ($categories->isEmpty())
            <div class="alert alert-info">
                <p>Aucune catégorie disponible pour le moment.</p>
            </div>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom de la catégorie</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->description }}</td>
                            <td>
                                <a href="{{ route('categories.show', $category->id) }}" class="btn btn-primary">Voir</a>
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">Modifier</a>
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?')">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <a href="{{ route('categories.create') }}" class="btn btn-success">Ajouter une nouvelle catégorie</a>
    </div>
@endsection
