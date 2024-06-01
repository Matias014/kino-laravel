<nav>
    <div class="links">
        <a href="{{ route('index') }}">Strona główna</a>
        <a href="{{ route('repertuar') }}">Repertuar</a>
        <a href="#Kontakt">Kontakt</a>
        {{-- <a href="{{ route('login') }}">Zaloguj się</a> --}}
        @if (Auth::check())
            <a href="{{ route('user.reservations') }}">Konto </a>
            <a href="{{ route('logout') }}">{{ Auth::user()->name }}, wyloguj się</a>
        @else
            <a class="nav-link" href="{{ route('login') }}">Zaloguj się</a>
            <a class="nav-link" href="{{ route('login') }}">Zarejestruj się</a>
        @endif
    </div>
</nav>
