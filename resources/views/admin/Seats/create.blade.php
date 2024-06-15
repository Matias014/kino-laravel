<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj nowe miejsce</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    @include('shared.navbar')
</head>

<body>
    <header>
        <h1>Dodaj nowe miejsce</h1>
    </header>

    @include('shared.navbar2')

    <div class="container mt-5 mb-5">

        @include('shared.session-error')

        <div class="row d-flex justify-content-center">
            <div class="col-6">
                @include('shared.validation-error')
                <form method="POST" action="{{ route('seats.store') }}" class="needs-validation" novalidate>
                    @csrf
                    <div class="form-group mb-2">
                        <label for="screening_room_id" class="form-label">ID Sali Projekcyjnej</label>
                        <input id="screening_room_id" name="screening_room_id" type="text"
                            class="form-control @if ($errors->first('screening_room_id')) is-invalid @endif"
                            value="{{ old('screening_room_id') }}">
                        <div class="invalid-feedback">Nieprawidłowy ID sali projekcyjnej!</div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="row_number" class="form-label">Rząd</label>
                        <input id="row_number" name="row_number" type="number"
                            class="form-control @if ($errors->first('row_number')) is-invalid @endif"
                            value="{{ old('row_number') }}">
                        <div class="invalid-feedback">Nieprawidłowy rząd!</div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="seat_in_row" class="form-label">Miejsce w rzędzie</label>
                        <input id="seat_in_row" name="seat_in_row" type="number"
                            class="form-control @if ($errors->first('seat_in_row')) is-invalid @endif"
                            value="{{ old('seat_in_row') }}">
                        <div class="invalid-feedback">Nieprawidłowe miejsce w rzędzie!</div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="vip" class="form-label">VIP</label>
                        <select id="vip" name="vip"
                            class="form-control @if ($errors->first('vip')) is-invalid @endif">
                            <option value="T" {{ old('vip') == 'T' ? 'selected' : '' }}>Tak</option>
                            <option value="N" {{ old('vip') == 'N' ? 'selected' : '' }}>Nie</option>
                        </select>
                        <div class="invalid-feedback">Nieprawidłowy wybór VIP!</div>
                    </div>
                    <div class="text-center mt-4 mb-4">
                        <input class="btn btn-success" type="submit" value="Dodaj">
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('shared.footer')
</body>

</html>
