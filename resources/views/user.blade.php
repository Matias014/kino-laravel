<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moje Rezerwacje</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
        }

        .reservation-card {
            margin-bottom: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #f9f9f9;
        }
    </style>
    @include('shared.navbar')
</head>

<body>
    @include('shared.navbar2')
    <div class="container">
        <h1 class="text-center">Moje bilety</h1>
        @foreach ($reservations as $reservation)
            <div class="reservation-card">
                <h3>{{ $reservation->seance->film->name }}</h3>
                <p><strong>Sala:</strong> {{ $reservation->seance->screeningRoom->id }}</p>
                <p><strong>Data i godzina:</strong>
                    {{ \Carbon\Carbon::parse($reservation->seance->start_time)->format('d M Y, H:i') }}</p>
                <p><strong>Miejsca:</strong>
                    @if ($reservation->reservationSeats->isNotEmpty())
                        @foreach ($reservation->reservationSeats as $reservationSeat)
                            rząd {{ $reservationSeat->seat->row }}- miejsce {{ $reservationSeat->seat->seat_in_row }}@if (!$loop->last)
                                ,
                            @endif
                        @endforeach
                    @else
                        Brak danych o miejscach
                    @endif
                </p>
                <form method="POST" action="{{ route('user.reservations.cancel', $reservation->id) }}">
                    @csrf
                    <button type="submit" class="btn btn-danger">Anuluj bilet</button>
                </form>
            </div>
        @endforeach
        <div class="text-center mt-5">
            <a href="{{ route('user.edit') }}" class="btn btn-warning">Edytuj dane</a>
            <form method="POST" action="{{ route('user.delete') }}" style="display:inline;">
                @csrf
                <button type="submit" class="btn btn-danger"
                    onclick="return confirm('Czy na pewno chcesz usunąć konto?')">Usuń konto</button>
            </form>
        </div>
    </div>
    @include('shared.footer')
</body>

</html>
