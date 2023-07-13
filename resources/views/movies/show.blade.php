@extends('layouts.app')

@section('content')
    <div>
        <h1>{{ $movie->title }}</h1>
        <p>{{ $movie->synopsis }}</p>
        <p>Durée: {{ $movie->duration }}</p>
        <p>Sortie: {{ $movie->released_at }}</p>
        <p>Catégorie: {{ $movie->category_id }}</p>
    </div>
@endsection