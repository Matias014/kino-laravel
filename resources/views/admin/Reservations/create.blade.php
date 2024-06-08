<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj nową rezerwację</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    @include('shared.navbar')
</head>

<body>
    <header>
        <h1>Dodaj nową rezerwację</h1>
    </header>

    @include('shared.navbar2')

    <div class="container mt-5 mb-5">

        @include('shared.session-error')

        <div class="row d-flex justify-content-center">
            <div class="col-6">
                @include('shared.validation-error')
                <form method="POST" action="{{ route('reservations.store') }}" class="needs-validation" novalidate>
                    @csrf
                    <div class="form-group mb-2">
                        <label for="seance_id" class="form-label">ID Seansu</label>
                        <input id="seance_id" name="seance_id" type="text"
                            class="form-control @if ($errors->first('seance_id')) is-invalid @endif"
                            value="{{ old('seance_id') }}">
                        <div class="invalid-feedback">Nieprawidłowy ID seansu!</div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="user_id" class="form-label">ID Użytkownika</label>
                        <input id="user_id" name="user_id" type="text"
                            class="form-control @if ($errors->first('user_id')) is-invalid @endif"
                            value="{{ old('user_id') }}">
                        <div class="invalid-feedback">Nieprawidłowy ID użytkownika!</div>
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
