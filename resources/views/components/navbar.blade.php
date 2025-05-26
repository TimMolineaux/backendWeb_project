<nav>
    <div class="nav-left">
        <a href="{{ route('index') }}">Home</a>
    </div>
    <div class="nav-right">
        @auth
            <a href="{{ route('profile.myProfile') }}">{{ Auth::user()->name }}</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" >Uitloggen</button>
            </form>
        @else
            <a href="{{ route('login') }}">Inloggen</a>
            <a href="{{ route('register') }}">Registreren</a>
        @endauth
    </div>
</nav>