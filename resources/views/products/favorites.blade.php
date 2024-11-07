@extends('layouts.app')

@section('content')
    <h1>Vos Favoris</h1>
    <ul>
        @foreach($favorites as $favorite)
            <li>{{ $favorite->name }}</li>
        @endforeach
    </ul>
@endsection
