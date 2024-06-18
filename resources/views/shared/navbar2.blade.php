<nav>
    <div class="links">
        <a href="{{ route('index') }}">Strona główna</a>
        <a href="{{ route('repertuar') }}">Repertuar</a>
        @if (Auth::check())
            <a href="{{ route('user.reservations') }}">Konto</a>
            @if (Auth::user()->role == 'admin')
                <div class="dropdown">
                    <a href="javascript:void(0)" class="dropbtn">Admin</a>
                    <div class="dropdown-content">
                        <a href="{{ route('films.index') }}">Filmy</a>
                        <a href="{{ route('products.index') }}">Produkty</a>
                        <a href="{{ route('promotions.index') }}">Promocje</a>
                        <a href="{{ route('reservations.index') }}">Rezerwacje</a>
                        <a href="{{ route('reservation_products.index') }}">Rezerwacje produktów</a>
                        <a href="{{ route('reservation_seats.index') }}">Rezerwacje miejsc</a>
                        <a href="{{ route('screening_rooms.index') }}">Sale kinowe</a>
                        <a href="{{ route('seances.index2') }}">Seanse</a>
                        <a href="{{ route('seats.index') }}">Miejsca</a>
                        <a href="{{ route('technologies.index') }}">Technologie</a>
                        <a href="{{ route('tickets.index') }}">Bilety</a>
                        <a href="{{ route('users.index') }}">Użytkownicy</a>
                        <a href="{{ route('vouchers.index') }}">Vouchery</a>
                        <a href="{{ route('workers.index') }}">Pracownicy</a>
                    </div>
                </div>
            @endif
            <a href="{{ route('logout') }}">{{ Auth::user()->name }}, wyloguj się</a>
        @else
            <a class="nav-link" href="{{ route('login') }}">Zaloguj się</a>
        @endif
    </div>
</nav>
