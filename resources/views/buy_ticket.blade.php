<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kup bilet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: black;
            color: white;
        }

        .seat {
            width: 40px;
            height: 40px;
            margin: 5px;
            background-color: #1b8010;
            border-radius: 5px;
            display: inline-block;
            text-align: center;
            line-height: 40px;
            color: white;
            cursor: pointer;
        }

        .seat.selected {
            background-color: #d9534f;
        }

        .seat.vip {
            background-color: #ffbf00;
        }

        .seat.vip.selected {
            background-color: red;
        }

        .seat.reserved {
            background-color: #333;
            cursor: not-allowed;
        }

        .screen {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px;
            width: 100%;
            margin: 20px 0;
        }

        .row {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 10px;
        }

        .row-number {
            margin-right: 10px;
            display: inline-block;
            width: 30px;
            text-align: center;
            line-height: 40px;
        }

        .seats-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 250px;
        }

        .container {
            max-width: 800px;
            margin: auto;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="text-center">Kup bilet na {{ $seance->film->name }}</h1>
        <h3 class="text-center">Sala nr {{ $seance->screeningRoom->id }}</h3>
        <div class="screen">Ekran</div>
        @include('shared.session-error')
        @include('shared.validation-error')
        <div class="seats-container">
            @php
                $seatsGroupedByRow = $seats->groupBy('row_number');
            @endphp

            @foreach ($seatsGroupedByRow as $rowNumber => $seatsInRow)
                <div class="row">
                    <div class="row-number">{{ $rowNumber }}</div>
                    @foreach ($seatsInRow as $seat)
                        <div class="seat @if ($seat->vip == 'T') vip @endif @if (in_array($seat->id, $reservedSeats)) reserved @endif"
                            data-seat-id="{{ $seat->id }}">
                            {{ $seat->seat_in_row }}
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
        <div class="text-center">
            <form id="reservation-form" method="POST" action="{{ route('purchase') }}">
                @csrf
                <input type="hidden" name="seance_id" value="{{ $seance->id }}">
                <input type="hidden" name="seats" id="selected-seats">
                <button type="submit" class="btn btn-primary mt-3">Zarezerwuj</button>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const seats = document.querySelectorAll('.seat:not(.reserved)');
            seats.forEach(seat => {
                seat.addEventListener('click', function() {
                    this.classList.toggle('selected');
                    if (this.classList.contains('vip')) {
                        this.classList.toggle('vip-selected');
                    }
                });
            });

            document.getElementById('reservation-form').addEventListener('submit', function(event) {
                event.preventDefault();
                const selectedSeats = [];
                document.querySelectorAll('.seat.selected').forEach(seat => {
                    const seatId = seat.getAttribute('data-seat-id');
                    if (seatId) {
                        selectedSeats.push({
                            id: seatId
                        });
                    }
                });
                document.getElementById('selected-seats').value = JSON.stringify(selectedSeats);
                this.submit();
            });
        });
    </script>
</body>

</html>
