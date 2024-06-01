<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kino M&M</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        section {
            padding: 20px;
            text-align: center;
        }

        footer {
            background-color: #201919;
            color: white;
            padding: 10px 20px;
            text-align: center;
            margin-top: auto;
        }

        .carousel {
            max-width: 400px;
            margin: 20px auto;
        }

        .carousel-item {
            height: 600px;
        }

        .carousel-item img {
            width: 100%;
            max-height: 100%;
            object-fit: contain;
        }

        .styled-section {
            background-color: #f8f9fa;
            padding: 40px 20px;
            margin: 20px 0;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .styled-section h2 {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            color: #343a40;
        }

        .styled-section p {
            font-family: 'Georgia', serif;
            color: #6c757d;
        }
    </style>
    @include('shared.navbar')
</head>

<body>
    <header>
        <h1>Witaj w Kinie M&M</h1>
    </header>

    <nav>
        <div class="links">
            <a href="{{ route('index') }}">Strona główna</a>
            <a href="{{ route('repertuar') }}">Repertuar</a>
            <a href="#Kontakt">Kontakt</a>
            <a href="#logowanie">Zaloguj się</a>
        </div>
    </nav>

    <section id="Strona główna">
        <h2 class="font-weight-bold">Aktualne hity</h2>
        <p>Oglądaj najlepsze filmowe hity dostępne w naszym kinie!</p>

        <div id="carouselExampleCaptions" class="carousel slide container">
            <div class="carousel-inner">
                @forelse ($films as $film)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        <img src="{{ asset('storage/img/' . $film->img) }}" class="d-block w-100"
                            alt="{{ $film->name }}">
                    </div>
                @empty
                    <p>Brak filmów.</p>
                @endforelse
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <section id="Repertuar" class="styled-section">
        <h2>Repertuar</h2>
        <p>Sprawdź nasze różnorodne oferty filmowe. Wybierz seanse z filmami, które najbardziej Cię zainteresują!</p>
    </section>

    <section id="Kontakt" class="styled-section">
        <h2>Skontaktuj się z nami</h2>
        <p>Wyślij email na adres biuro@m&m.pl lub zadzwoń do nas pod numer 733 029 199, aby uzyskać więcej informacji.
        </p>
    </section>

    <footer>
        <p>© 2024 Kino M&M. Wszystkie prawa zastrzeżone.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
