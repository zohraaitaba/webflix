@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <h1>Modifier {{ $movie->title }}</h1>

            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')

                <div class="mb-3">
                    <label for="title" class="form-label">Titre</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $movie->title) }}" class="form-control">
                    @error('title')
                        <div>{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="synopsis" class="form-label">Synopsis</label>
                    <textarea name="synopsis" id="synopsis" class="form-control">{{ old('synopsis', $movie->synopsis) }}</textarea>
                    @error('synopsis')
                        <div>{{ $message }}</div>
                    @enderror
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label for="duration" class="form-label">Durée</label>
                        <input type="text" name="duration" id="duration" value="{{ old('duration', $movie->duration) }}" class="form-control">
                        @error('duration')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col">
                        <label for="youtube" class="form-label">Youtube</label>
                        <input type="text" name="youtube" id="youtube" value="{{ old('youtube', $movie->youtube) }}" class="form-control">
                        @error('youtube')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <div class="row">
                        <div class="col-lg-9">
                            <label for="cover" class="form-label">Image</label>
                            <input type="file" name="cover" id="cover" class="form-control">
                            @error('cover')
                                <div>{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-lg-3 text-center">
                            <img width="100" src="{{ $movie->cover }}" alt="{{ $movie->title }}" class="mt-3">
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label for="released_at" class="form-label">Date de sortie</label>
                        <input type="date" name="released_at" id="released_at" value="{{ old('released_at', $movie->released_at->format('Y-m-d')) }}" class="form-control">
                        @error('released_at')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col">
                        <label for="category" class="form-label">Catégorie</label>
                        <select name="category" id="category" class="form-select">
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
                </div>

                <button class="btn btn-primary">Modifier</button>
            </form>
        </div>
    </div>
@endsection