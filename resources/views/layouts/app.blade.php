<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @section('title')
            Webflix
        @show
    </title>
</head>
<body>
    <nav>
        <a href="/">Accueil</a>
        <a href="/fiorella">Fiorella</a>
        <a href="/fiorella?color=blue">Fiorella bleue</a>
        <a href="/fiorella/emma">Fiorella et Emma</a>
        <a href="/fiorella/paul">Fiorella et Paul</a>
        <a href="/a-propos">A propos</a>
    </nav>

    @yield('content')

    <footer>
        {{ date('Y') }}
    </footer>
</body>
</html>