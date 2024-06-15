<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edycja Seansu {{ $seance->id }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    @include('shared.navbar')
</head>

<body>
    <header>
        <h1>Edycja Seansu {{ $seance->id }}</h1>
    </header>

    @include('shared.navbar2')

    <div class="container mt-5 mb-5">

        @include('shared.session-error')

        <div class="row d-flex justify-content-center">
            <div class="col-6">
                @include('shared.validation-error')
                <form method="POST" action="{{ route('seances.update', $seance->id) }}" class="needs-validation"
                    novalidate>
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-2">
                        <label for="film_id" class="form-label">ID Filmu</label>
                        <input id="film_id" name="film_id" type="text"
                            class="form-control @if ($errors->first('film_id')) is-invalid @endif"
                            value="{{ $seance->film_id }}">
                        <div class="invalid-feedback">Nieprawidłowy ID filmu!</div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="screening_room_id" class="form-label">ID Sali Projekcyjnej</label>
                        <input id="screening_room_id" name="screening_room_id" type="text"
                            class="form-control @if ($errors->first('screening_room_id')) is-invalid @endif"
                            value="{{ $seance->screening_room_id }}">
                        <div class="invalid-feedback">Nieprawidłowy ID sali projekcyjnej!</div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="worker_id" class="form-label">ID Pracownika</label>
                        <input id="worker_id" name="worker_id" type="text"
                            class="form-control @if ($errors->first('worker_id')) is-invalid @endif"
                            value="{{ $seance->worker_id }}">
                        <div class="invalid-feedback">Nieprawidłowy ID pracownika!</div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="technology_id" class="form-label">ID Technologii</label>
                        <input id="technology_id" name="technology_id" type="text"
                            class="form-control @if ($errors->first('technology_id')) is-invalid @endif"
                            value="{{ $seance->technology_id }}">
                        <div class="invalid-feedback">Nieprawidłowy ID technologii!</div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="promotion_id" class="form-label">ID Promocji</label>
                        <input id="promotion_id" name="promotion_id" type="text"
                            class="form-control @if ($errors->first('promotion_id')) is-invalid @endif"
                            value="{{ $seance->promotion_id }}">
                        <div class="invalid-feedback">Nieprawidłowy ID promocji!</div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="start_time" class="form-label">Czas Rozpoczęcia</label>
                        <input id="start_time" name="start_time" type="datetime-local"
                            class="form-control @if ($errors->first('start_time')) is-invalid @endif"
                            value="{{ $seance->start_time }}">
                        <div class="invalid-feedback">Nieprawidłowy czas rozpoczęcia!</div>
                    </div>
                    {{-- <div class="form-group mb-2">
                        <label for="end_time" class="form-label">Czas Zakończenia</label>
                        <input id="end_time" name="end_time" type="datetime-local"
                            class="form-control @if ($errors->first('end_time')) is-invalid @endif"
                            value="{{ $seance->end_time }}">
                        <div class="invalid-feedback">Nieprawidłowy czas zakończenia!</div>
                    </div> --}}
                    <div class="text-center mt-4 mb-4">
                        <input class="btn btn-success" type="submit" value="Wyślij">
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('shared.footer')
</body>

</html>
