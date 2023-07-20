@extends('layouts.app')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/acteurs">Acteurs</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $actor->name }}</li>
        </ol>
    </nav>

    <div class="row">
        @if ($actor->avatar)
        <div class="col-lg-4">
            <img class="img-fluid rounded-5" src="{{ $actor->avatar }}" alt="{{ $actor->name }}">
        </div>
        @endif

        <div class="@if ($actor->avatar) col-lg-8 @else col-lg-12 @endif">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h1>{{ $actor->name }}</h1>
                    @if ($actor->birthday)
                    <p>Âge: {{ $actor->birthday->age }} ans</p>
                    @endif

                    @if ($actor->movies->isNotEmpty())
                        <h2 class="mt-4">Films</h2>
                        <div class="row row-cols-2 row-cols-lg-5 mt-5">
                            @foreach ($actor->movies as $movie)
                                <div class="col scale">
                                    <a class="text-decoration-none text-dark" href="/film/{{ $movie->id }}">
                                        <img class="img-fluid" src="{{ $movie->cover }}" alt="{{ $movie->title }}">
                                        <h6 class="mt-2">{{ $movie->title }}</h6>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection