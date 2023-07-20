@extends('layouts.app')

@section('content')
    @if (Auth::user())
        <div class="text-center mb-4">
            <a class="btn btn-primary" href="/acteurs/creer">Créer un acteur</a>
        </div>
    @endif

    <div class="row row-cols-2 row-cols-lg-4 gy-4 mb-5">
        @forelse ($actors as $actor)
            <div class="col">
                <div class="card scale">
                    <!-- /acteur/{{ $actor->id }} -->
                    <a href="{{ route('actors.show', $actor) }}" class="text-decoration-none text-dark">
                        @if ($actor->avatar)
                        <img class="card-img-top" src="{{ $actor->avatar }}" alt="{{ $actor->name }}">
                        @endif
                        <div class="card-body">
                            <h3>{{ $actor->name }}</h3>
                            @if ($actor->birthday)
                            <small>{{ $actor->birthday->age }} ans</small>
                            @endif

                            @if (Auth::user())
                            <div class="text-center">
                                <a href="/acteur/{{ $actor->id }}/modifier" class="btn btn-lg">🖋️</a>
                                <form class="d-inline" action="/acteur/{{ $actor->id }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-lg">🗑️</button>
                                </form>
                            </div>
                            @endif
                        </div>
                    </a>
                </div>
            </div>
        @empty
            <div class="col flex-grow-1">
                <h1 class="text-center">Il n'y a pas d'acteurs</h1>
            </div>
        @endforelse
    </div>

    {{ $actors->links() }}
@endsection