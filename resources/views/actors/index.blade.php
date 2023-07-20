@extends('layouts.app')

@section('content')
@if (Auth::user())
    <div class="text-center mb-4">
        <a class="btn btn-primary" href="/acteurs/creer">Créer un acteur</a>
    </div>
@endif

<div class="row row-cols-sm-1 row-cols-md-3 row-cols-lg-5">
    @foreach ($actors as $actor)
        <div class="col d-flex flex-column">
            <img class="img-fluid" src="{{ $actor->avatar }}" alt"{{ $actor->name }}">
            <div class="d-flex flex-column justify-content-between flex-grow-1">
                <h3 class="list-actor-name">
                    <a href="/actor/{{ $actor->id }}">
                    {{ $actor->name }}
                    </a>
                </h3>
                @if (Auth::user() && $actor->user_id===Auth::user()->id)
                        
                    @endif
                    <div class="text-center">
                        <a href="/actor/{{ $actor->id }}" class="btn btn-lg h1">🖋️</a>
                        <form class="d-inline" action="/actor/{{ $actor->id }}" method="POST">
                        @csrf
                        @method('delete')
                        <button class="btn btn-lg h1">🗑️</button>
                        </form>
                    </div>
        </div>
    @endforeach
</div>

{{ $actors->links() }}
@endsection