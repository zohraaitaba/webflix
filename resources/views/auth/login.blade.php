@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow-sm">
                <div class="card-header">Connexion</div>

                <div class="card-body">
                    @if ($errors->any())
                        <ul class="alert alert-danger px-4">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <form action="" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" class="form-control mt-2" value="{{ old('email') }}">
                        </div>
                        <div class="mb-3">
                            <label for="password">Mot de passe</label>
                            <input type="password" name="password" id="password" class="form-control mt-2">
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input type="checkbox" name="remember" id="remember" class="form-check-input">
                                <label for="remember" class="form-check-label">Se rappeler de moi</label>
                            </div>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-primary">Connexion</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection