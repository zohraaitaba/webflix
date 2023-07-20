@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <h1>Modifier {{ $actor->name }}</h1>

            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')

                <div class="mb-3">
                    <label for="name" class="form-label">Nom</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $actor->name) }}" class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <div class="row">
                        <div class="col-lg-9">
                            <label for="avatar" class="form-label">Avatar</label>
                            <input type="file" name="avatar" id="avatar" class="form-control @error('avatar') is-invalid @enderror">
                            @error('avatar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-lg-3 text-center">
                            <img width="100" src="{{ $actor->avatar }}" alt="{{ $actor->avatar }}" class="mt-3">
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="birthday" class="form-label">Date de naissance</label>
                    <input type="date" name="birthday" id="birthday" value="{{ old('birthday', $actor->birthday->format('Y-m-d')) }}" class="form-control @error('birthday') is-invalid @enderror">
                    @error('birthday')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button class="btn btn-primary">Modifier</button>
            </form>
        </div>
    </div>
@endsection