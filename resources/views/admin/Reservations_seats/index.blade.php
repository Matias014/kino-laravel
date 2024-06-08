<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rezerwacje Miejsc</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    @include('shared.navbar')
</head>

<body>
    <header>
        <h1>Rezerwacje Miejsc</h1>
    </header>

    @include('shared.navbar2')

    <div class="container mt-5 mb-5">
        @include('shared.session-error')

        <div class="row mb-2">
            <a href="{{ route('reservation_seats.create') }}">Dodaj nową rezerwację miejsca</a>
        </div>

        <div class="row">
            <div class="table-responsive-sm">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">ID Rezerwacji</th>
                            <th scope="col">ID Miejsca</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($reservationSeats as $reservationSeat)
                            <tr>
                                <td>{{ $reservationSeat->id }}</td>
                                <td>{{ $reservationSeat->reservation_id }}</td>
                                <td>{{ $reservationSeat->seat_id }}</td>
                                <td>
                                    <a href="{{ route('reservation_seats.edit', $reservationSeat->id) }}">Edycja</a>
                                </td>
                                <td>
                                    <form method="POST"
                                        action="{{ route('reservation_seats.destroy', $reservationSeat->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="btn btn-danger" value="Usuń"
                                            style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" />
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <th scope="row" colspan="4">Brak rezerwacji miejsc.</th>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @include('shared.footer')
</body>

</html>
