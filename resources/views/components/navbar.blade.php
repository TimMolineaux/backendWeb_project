<nav style="display:flex; justify-content:space-between; background:#eee; padding:10px 20px;">
    <div class="nav-left" style="display:flex; gap:15px; align-items:center;">
        <a href="{{ route('index') }}" style="font-weight:bold; color:#333; text-decoration:none;">Home</a>
    </div>
    <div class="nav-right" style="display:flex; gap:15px; align-items:center;">
        @auth
            <span>{{ Auth::user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                @csrf
                <button type="submit" style="background:none; border:none; cursor:pointer; color:blue; text-decoration:underline; padding:0;">Uitloggen</button>
            </form>
        @else
            <a href="{{ route('login') }}" style="color:#333; text-decoration:none;">Inloggen</a>
            <a href="{{ route('register') }}" style="color:#333; text-decoration:none;">Registreren</a>
        @endauth
    </div>
</nav>