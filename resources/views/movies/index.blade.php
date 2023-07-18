@extends('layouts.app')

@section('content')
@if (Auth::user())
    <div class="text-center mb-4">
        <a class="btn btn-primary" href="/films/creer">Créer un film</a>
    </div>
@endif

    <div class="row row-cols-sm-1 row-cols-md-3 row-cols-lg-5">
        @foreach ($movies as $movie)
            <div class="col d-flex flex-column">
                <img class="img-fluid" src="{{ $movie->cover }}" alt"{{ $movie->title }}">
                <div class="d-flex flex-column justify-content-between flex-grow-1">
                    <h3 class="list-movie-title">
                        <a href="/film/{{ $movie->id }}">
                        {{ $movie->title }}
                        </a>
                    </h3>
                    <p class="list-movie-synopsis">{{ Str::words($movie->synopsis, 5) }}
                    <p class="list-movie-meta">
                    </p>

                    @if (Auth::user() && $movie->user_id===Auth::user()->id)
                        
                    @endif
                    <div class="text-center">
                        <a href="/film/{{ $movie->id }}" class="btn btn-lg h1">🖋️</a>
                        <form class="d-inline" action="/film/{{ $movie->id }}" method="POST">
                        @csrf
                        @method('delete')
                        <button class="btn btn-lg h1">🗑️</button>
                        </form>
                    </div>

                        {{ $movie->duration }} |
                        @if ($movie->released_at) {{--  si il ya une date on la transforme sinon on fait rien --}}
                        {{ $movie->released_at->translatedFormat('d F Y') }} |
                        @endif
                        {{ $movie->category->name}}
                    
                </div>
            </div>
        @endforeach
    </div>

    {{ $movies->links() }}
@endsection