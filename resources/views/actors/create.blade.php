@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <h1>Créer un acteur</h1>

            <form action="" method="post" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Nom</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="avatar" class="form-label">Avatar</label>
                    <input type="file" name="avatar" id="avatar" class="form-control @error('avatar') is-invalid @enderror">
                    @error('avatar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="birthday" class="form-label">Date de naissance</label>
                    <input type="date" name="birthday" id="birthday" value="{{ old('birthday') }}" class="form-control @error('birthday') is-invalid @enderror">
                    @error('birthday')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button class="btn btn-primary">Ajouter</button>
            </form>
        </div>
    </div>
@endsection