@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <h1>Créer un film</h1>

            <form action="" method="post" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label">Titre</label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="synopsis" class="form-label">Synopsis</label>
                    <textarea name="synopsis" id="synopsis" class="form-control @error('synopsis') is-invalid @enderror">{{ old('synopsis') }}</textarea>
                    @error('synopsis')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label for="duration" class="form-label">Durée</label>
                        <input type="text" name="duration" id="duration" value="{{ old('duration') }}" class="form-control @error('duration') is-invalid @enderror">
                        @error('duration')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col">
                        <label for="youtube" class="form-label">Youtube</label>
                        <input type="text" name="youtube" id="youtube" value="{{ old('youtube') }}" class="form-control @error('youtube') is-invalid @enderror">
                        @error('youtube')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="cover" class="form-label">Image</label>
                    <input type="file" name="cover" id="cover" class="form-control @error('cover') is-invalid @enderror">
                    @error('cover')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label for="released_at" class="form-label">Date de sortie</label>
                        <input type="date" name="released_at" id="released_at" value="{{ old('released_at') }}" class="form-control @error('released_at') is-invalid @enderror">
                        @error('released_at')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col">
                        <label for="category" class="form-label">Catégorie</label>
                        <select name="category" id="category" class="form-select @error('category') is-invalid @enderror">
                            <option disabled selected>Choisir une catégorie</option>
                            @foreach ($categories->sortBy('name') as $category)
                                <option value="{{ $category->id }}" @selected($category->id == old('category'))>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <button class="btn btn-primary">Ajouter</button>
            </form>
        </div>
    </div>
@endsection