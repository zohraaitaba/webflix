@extends('layouts.app')

@section('content')
    <div>
        @foreach ($movies as $movie)
            <div>
                <h3>{{ $movie->title }}</h3>
                <p>{{ $movie->synopsis }}</p>
                <p>Durée: {{ $movie->duration }}</p>
                <p>Sortie: {{ $movie->released_at }}</p>
                <p>Catégorie: {{ $movie->category_id }}</p>
                <a href="/film/{{ $movie->id }}">Voir</a>
            </div>
        @endforeach
    </div>
@endsection