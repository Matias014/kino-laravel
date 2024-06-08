<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edycja Pracownika {{ $worker->id }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    @include('shared.navbar')
</head>

<body>
    <header>
        <h1>Edycja Pracownika {{ $worker->id }}</h1>
    </header>

    @include('shared.navbar2')

    <div class="container mt-5 mb-5">

        @include('shared.session-error')

        <div class="row d-flex justify-content-center">
            <div class="col-6">
                @include('shared.validation-error')
                <form method="POST" action="{{ route('workers.update', $worker->id) }}" class="needs-validation"
                    novalidate>
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-2">
                        <label for="name" class="form-label">Imię</label>
                        <input id="name" name="name" type="text"
                            class="form-control @if ($errors->first('name')) is-invalid @endif"
                            value="{{ $worker->name }}">
                        <div class="invalid-feedback">Nieprawidłowe imię!</div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="surname" class="form-label">Nazwisko</label>
                        <input id="surname" name="surname" type="text"
                            class="form-control @if ($errors->first('surname')) is-invalid @endif"
                            value="{{ $worker->surname }}">
                        <div class="invalid-feedback">Nieprawidłowe nazwisko!</div>
                    </div>
                    {{-- <div class="form-group mb-2">
                        <label for="start_time" class="form-label">Czas rozpoczęcia</label>
                        <input id="start_time" name="start_time" type="datetime-local"
                            class="form-control @if ($errors->first('start_time')) is-invalid @endif"
                            value="{{ $worker->start_time }}">
                        <div class="invalid-feedback">Nieprawidłowy czas rozpoczęcia!</div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="end_time" class="form-label">Czas zakończenia</label>
                        <input id="end_time" name="end_time" type="datetime-local"
                            class="form-control @if ($errors->first('end_time')) is-invalid @endif"
                            value="{{ $worker->end_time }}">
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
