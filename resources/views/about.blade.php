@extends('layouts.app')

@section('content')
    <h1>A propos de {{ $name }}</h1>
    <ul>
        @foreach ($team as $member)
            <li>
                <a href="/a-propos/{{ $member['name'] }}">{{ $member['name'] }}</a>
            </li>
        @endforeach
    </ul>
@endsection