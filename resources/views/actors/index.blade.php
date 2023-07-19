@extends('layouts.app')

@section('content')
@if (Auth::user())
    <div class="text-center mb-4">
        <a class="btn btn-primary" href="/acteurs/creer">Ajouter un acteur</a>
    </div>
@endif

    

   
@endsection