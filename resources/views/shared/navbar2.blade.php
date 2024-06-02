<nav>
    <div class="links">
        <a href="{{ route('index') }}">Strona główna</a>
        <a href="{{ route('repertuar') }}">Repertuar</a>
        <a href="#Kontakt">Kontakt</a>
        @if (Auth::check())
            <a href="{{ route('user.reservations') }}">Konto</a>
            @if (Auth::user()->role == 'admin')
                <div class="dropdown">
                    <a href="javascript:void(0)" class="dropbtn">Admin</a>
                    <div class="dropdown-content">
                        <a href="{{ route('films.index') }}">Filmy</a>
                        <a href="{{ route('admin.products') }}">Produkty</a>
                        <a href="{{ route('admin.promotions') }}">Promocje</a>
                        <a href="{{ route('admin.reservations') }}">Rezerwacje</a>
                        <a href="{{ route('admin.reservation_products') }}">Rezerwacje produktów</a>
                        <a href="{{ route('admin.reservation_seats') }}">Rezerwacje miejsc</a>
                        <a href="{{ route('admin.screening_rooms') }}">Sale kinowe</a>
                        <a href="{{ route('admin.seances') }}">Seanse</a>
                        <a href="{{ route('admin.seats') }}">Miejsca</a>
                        <a href="{{ route('admin.technologies') }}">Technologie</a>
                        <a href="{{ route('admin.tickets') }}">Bilety</a>
                        <a href="{{ route('admin.users') }}">Użytkownicy</a>
                        <a href="{{ route('admin.vouchers') }}">Vouchery</a>
                        <a href="{{ route('admin.workers') }}">Pracownicy</a>
                    </div>
                </div>
            @endif
            <a href="{{ route('logout') }}">{{ Auth::user()->name }}, wyloguj się</a>
        @else
            <a class="nav-link" href="{{ route('login') }}">Zaloguj się</a>
            <a class="nav-link" href="{{ route('register') }}">Zarejestruj się</a>
        @endif
    </div>
</nav>
