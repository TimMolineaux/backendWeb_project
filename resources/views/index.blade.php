<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Homepagina</title>
</head>
<body>
    <h1>Welkom op de homepagina</h1>

    @auth
        <p>Je bent ingelogd als {{ Auth::user()->name }}.</p>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Uitloggen</button>
        </form>
    @else
        <p><a href="{{ route('login') }}">Inloggen</a> of <a href="{{ route('register') }}">Registreren</a></p>
    @endauth
</body>
</html>