@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/films">Films</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $movie->title }}</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-lg-4 text-center mb-5">
            <img class="img-fluid rounded-5" src="{{ $movie->cover }}" alt="{{ $movie->title }}">
        </div>

        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h1>{{ $movie->title }}</h1>
                    <p>
                        <strong>{{ $movie->duration }}</strong> |
                        @if ($movie->released_at)
                        {{ $movie->released_at->translatedFormat('d F Y') }} |
                        @endif
                        <strong>{{ $movie->category->name }}</strong>
                    </p>
                    <p class="my-4">{{ $movie->synopsis }}</p>
                    @if ($movie->youtube)
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#movie-modal">
                        Voir la bande annonce
                    </button>
                    @endif

                    @if (count($movie->actors) > 0)
                        <h2 class="mt-4">Acteurs</h2>
                        <div class="row row-cols-2 row-cols-lg-5">
                            @foreach ($movie->actors as $actor)
                                <div class="col scale">
                                    <a class="text-decoration-none text-dark" href="{{ route('actors.show', $actor) }}">
                                        <img class="img-fluid" src="{{ $actor->avatar }}" alt="{{ $actor->name }}">
                                        <h6 class="mt-2">{{ $actor->name }}</h6>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @if ($movie->youtube)
    <!-- Modal movie -->
    <div class="modal fade" id="movie-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Bande annonce {{ $movie->title }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe width="100%" height="400" src="https://www.youtube.com/embed/{{ $movie->youtube }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>
    @endif
@endsection