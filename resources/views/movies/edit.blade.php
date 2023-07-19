@extends('layouts.app')

@section('content')
<h1>Modifier {{ $movie->title }}  </h1>

    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        
        <div>
            <label for="title">Titre</label>
            <input type="text" name="title" id="title" value="{{ old('title', $movie->title) }}">
            @error('title')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="synopsis">Synopsis</label>
            <textarea name="synopsis" id="synopsis">{{ old('synopsis', $movie->synopsis) }}</textarea>
            @error('synopsis')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="duration">Durée</label>
            <input type="text" name="duration" id="duration" value="{{ old('duration', $movie->duration) }}">
            @error('duration')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="youtube">Youtube</label>
            <input type="text" name="youtube" id="youtube" value="{{ old('youtube', $movie->youtube) }}">
            @error('youtube')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="cover">Image</label>
            <input type="file" name="cover" id="cover" >
            @error('cover')
                <div>{{ $message }}</div>
            @enderror
            <img width="300" src="{{$movie->cover}}" alt="{{$movie->title}}">
        </div>

        <div>
            <label for="released_at">Date de sortie</label>
            <input type="date" name="released_at" id="released_at" value="{{ old('released_at', $movie->released_at)->format('Y-m-d') }}">
            @error('released_at')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="category">Catégorie</label>
            <select name="category" id="category">
                <option disabled selected>Choisir une catégorie</option>
                @foreach ($categories->sortBy('name') as $category)
                    <option value="{{ $category->id }}" @selected($category->id == old('category', $movie->category_id))>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <button>Ajouter</button>
    </form>
@endsection