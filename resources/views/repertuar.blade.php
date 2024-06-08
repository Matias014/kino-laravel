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
            flex: 1;
            padding: 20px;
        }

        footer {
            background-color: #201919;
            color: white;
            padding: 10px 20px;
            text-align: center;
            margin-top: auto;
        }

        .navbar {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            background-color: #0f5206;
        }

        .day {
            text-align: center;
            margin: 0 5px;
            padding: 10px;
            background-color: #1b8010;
            color: white;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .day:hover {
            background-color: #29a01a;
            cursor: pointer;
        }

        .day.selected {
            background-color: #1d8716;
        }

        .day span {
            display: block;
        }

        .calendar-icon {
            margin-left: 10px;
            display: flex;
            align-items: center;
            padding: 10px;
            background-color: #1b8010;
            color: white;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .calendar-icon:hover {
            background-color: #29a01a;
            cursor: pointer;
        }

        .card {
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .card-img-top {
            width: 100%;
            height: 500px;
            object-fit: cover;
        }

        .card-body {
            flex: 1;
        }

        .no-seances {
            display: none;
            text-align: center;
            margin-top: 20px;
            font-size: 1.5rem;
            color: #d9534f;
        }
    </style>
    @include('shared.navbar')
</head>

<body>
    <header>
        <h1>Repertuar</h1>
    </header>

    @include('shared.navbar2')

    <div>
        <div class="navbar">
            @php
                $daysOfWeek = ['niedziela', 'poniedziałek', 'wtorek', 'środa', 'czwartek', 'piątek', 'sobota'];
                $months = [
                    'JANUARY' => 'Styczeń',
                    'FEBRUARY' => 'Luty',
                    'MARCH' => 'Marzec',
                    'APRIL' => 'Kwiecień',
                    'MAY' => 'Maj',
                    'JUNE' => 'Czerwiec',
                    'JULY' => 'Lipiec',
                    'AUGUST' => 'Sierpień',
                    'SEPTEMBER' => 'Wrzesień',
                    'OCTOBER' => 'Październik',
                    'NOVEMBER' => 'Listopad',
                    'DECEMBER' => 'Grudzień',
                ];
                $startDate = now();
                $numDays = 11;
            @endphp

            @for ($i = 0; $i < $numDays; $i++)
                @php
                    $currentDate = $startDate->copy()->addDays($i);
                    $dayOfWeek = $daysOfWeek[$currentDate->dayOfWeek];
                    $day = $currentDate->format('d');
                    $month = $months[strtoupper($currentDate->format('F'))];
                    $year = $currentDate->format('Y');
                    $date = $currentDate->format('Y-m-d');
                @endphp
                <div class="day" data-date="{{ $date }}">
                    <span>{{ $dayOfWeek }}</span>
                    <span>{{ $day }} {{ $month }}</span>
                    <span>{{ $year }}</span>
                </div>
            @endfor
        </div>
    </div>

    <section>
        <div class="container">
            <div class="row" id="seance-cards">
                @foreach ($seances as $seance)
                    <div class="col-md-4 d-flex seance-card"
                        data-date="{{ \Carbon\Carbon::parse($seance->start_time)->format('Y-m-d') }}">
                        <div class="card mb-4">
                            <img src="{{ asset('storage/img/' . $seance->film->img) }}" class="card-img-top"
                                alt="{{ $seance->film->name }}">
                            <div class="card-body d-flex flex-column justify-content-around">
                                <h5 class="card-title">{{ $seance->film->name }}</h5>
                                <p class="card-text">{{ $seance->film->description }}</p>
                                <p class="card-text">
                                    <strong>Rozpoczęcie seansu:</strong>
                                    {{ \Carbon\Carbon::parse($seance->start_time)->format('d M Y, H:i') }}<br>
                                    <strong>Czas trwania:</strong> {{ $seance->film->duration }} minut<br>
                                    <strong>Gatunek:</strong> {{ $seance->film->genre }}<br>
                                    <strong>Technologia wyświetlania:</strong> {{ $seance->technology->name }}<br>
                                    <strong>Promocja:</strong> {{ $seance->promotion->discount }}%<br>
                                </p>
                                @if (Auth::check())
                                    <a href="/seances/{{ $seance->id }}/buy" class="btn btn-primary">Kup bilet</a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="no-seances">Brak seansów na wybrany dzień</div>
        </div>
    </section>

    <footer>
        <p>© 2024 Kino M&M. Wszysttkie prawa zastrzeżone.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const days = document.querySelectorAll('.day');
            const seanceCardsContainer = document.getElementById('seance-cards');
            const noSeancesMessage = document.querySelector('.no-seances');

            days.forEach(day => {
                day.addEventListener('click', function() {
                    const selectedDate = this.getAttribute('data-date');

                    days.forEach(d => d.classList.remove('selected'));
                    this.classList.add('selected');

                    fetch(`/seances?date=${selectedDate}`)
                        .then(response => response.json())
                        .then(data => {
                            seanceCardsContainer.innerHTML = '';

                            if (data.length === 0) {
                                noSeancesMessage.innerHTML = `Brak seansów na ${selectedDate}`;
                                noSeancesMessage.style.display = 'block';
                            } else {
                                noSeancesMessage.style.display = 'none';
                                data.forEach(seance => {
                                    const card = document.createElement('div');
                                    card.classList.add('col-md-4', 'd-flex',
                                        'seance-card');
                                    card.innerHTML = `
                                        <div class="card mb-4">
                                            <img src="storage/img/${seance.film.img}" class="card-img-top" alt="${seance.film.name}">
                                            <div class="card-body d-flex flex-column justify-content-around">
                                                <h5 class="card-title">${seance.film.name}</h5>
                                                <p class="card-text">${seance.film.description}</p>
                                                <p class="card-text">
                                                    <strong>Rozpoczęcie seansu:</strong> ${new Date(seance.start_time).toLocaleString()}<br>
                                                    <strong>Czas trwania:</strong> ${seance.film.duration} minut<br>
                                                    <strong>Gatunek:</strong> ${seance.film.genre}<br>
                                                    <strong>Technologia wyświetlania:</strong> ${seance.technology.name}<br>
                                                    <strong>Promocja:</strong> ${seance.promotion.discount}%<br>
                                                </p>
                                                @if (Auth::check())
                                                <a href="/seances/${seance.id}/buy" class="btn btn-primary">Kup bilet</a>
                                                @endif

                                            </div>
                                        </div>
                                    `;
                                    seanceCardsContainer.appendChild(card);
                                });
                            }
                        });
                });
            });

            // Initially show today's seances
            const today = new Date().toISOString().split('T')[0];
            const todayElement = document.querySelector(`.day[data-date="${today}"]`);
            if (todayElement) {
                todayElement.click();
            } else {
                days[0].click();
            }
        });
    </script>
</body>

</html>
