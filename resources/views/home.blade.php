@extends('layouts/app')

@section('title')
    Accueil - @parent
@endsection

@section('content')
    <h1>Notre site: {{ $title }}</h1>

    <ul>
        @foreach ($numbers as $number)
            <li> {{ $number }} </li>
        @endforeach
    </ul>
@endsection