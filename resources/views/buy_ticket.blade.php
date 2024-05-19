<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kup bilet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .seat {
            width: 30px;
            height: 30px;
            margin: 5px;
            background-color: #1b8010;
            border-radius: 5px;
            display: inline-block;
            text-align: center;
            line-height: 30px;
            color: white;
            cursor: pointer;
        }

        .seat.selected {
            background-color: #d9534f;
        }

        .screen {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 5px;
            width: 80%;
            margin-left: 140px;
            margin-bottom: 300px;
        }

        .row {
            display: flex;
            justify-content: center;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Kup bilet na {{ $seance->film->name }}</h1>
        <h3>Sala nr {{ $seance->screeningRoom->id }}</h3>
        <div class="screen">Ekran</div>
        @foreach ($seatsGroupedByRow as $row => $seats)
            <div class="row">
                @foreach ($seats as $seat)
                    <div class="seat" data-seat-id="{{ $seat->id }}">
                        {{ $seat->SEAT_IN_ROW }}
                    </div>
                @endforeach
            </div>
        @endforeach
        <button id="buy-ticket" class="btn btn-primary mt-3">Zarezerwuj</button>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const seats = document.querySelectorAll('.seat');
            seats.forEach(seat => {
                seat.addEventListener('click', function() {
                    this.classList.toggle('selected');
                });
            });

            document.getElementById('buy-ticket').addEventListener('click', function() {
                const selectedSeats = [];
                document.querySelectorAll('.seat.selected').forEach(seat => {
                    selectedSeats.push({
                        seat_id: seat.getAttribute('data-seat-id')
                    });
                });
                fetch('{{ route('book_seats') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            seance_id: {{ $seance->id }},
                            seats: selectedSeats
                        })
                    }).then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert('Rezerwacja zakończona sukcesem!');
                        } else {
                            alert('Rezerwacja nie powiodła się.');
                        }
                    });
            });
        });
    </script>
</body>

</html>
