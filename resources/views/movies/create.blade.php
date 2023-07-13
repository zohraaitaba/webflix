@extends('layouts.app')
@section('content')
    <form action="" method="post">
        @csrf
        <div>
            <label for="title">Titre</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}">
            @error('title')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="synopsis">Synopsis</label>
            <textarea name="synopsis" id="synopsis"></textarea>
            <textarea name="synopsis" id="synopsis"> value="{{ old('synopsis') }}"</textarea>
            @error('synopsis')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="duration">Durée</label>
            <input type="text" name="duration" id="duration">
            <input type="text" name="duration" id="duration" value="{{ old('duration') }}">
            @error('duration')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="youtube">Youtube</label>
            <input type="text" name="youtube" id="youtube">
            <input type="text" name="youtube" id="youtube" value="{{ old('youtube') }}">
            @error('youtube')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="released_at">Date de sortie</label>
            <input type="date" name="released_at" id="released_at">
            <input type="date" name="released_at" id="released_at" value"{{ old('released_at') }}">
            @error('released_at')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="category">Catégorie</label>
            <select name="category" id="category">
                @foreach ($categories->sortBy('name') as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <button>Ajouter</button>
    </form>
@endsection