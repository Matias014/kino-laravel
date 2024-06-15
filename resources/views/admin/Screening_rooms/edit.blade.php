<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edycja Sali Projekcyjnej {{ $screeningRoom->id }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    @include('shared.navbar')
</head>

<body>
    <header>
        <h1>Edycja Sali Kinowej nr {{ $screeningRoom->id }}</h1>
    </header>

    @include('shared.navbar2')

    <div class="container mt-5 mb-5">

        @include('shared.session-error')

        <div class="row d-flex justify-content-center">
            <div class="col-6">
                @include('shared.validation-error')
                <form method="POST" action="{{ route('screening_rooms.update', $screeningRoom->id) }}"
                    class="needs-validation" novalidate>
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-2">
                        <label for="seats" class="form-label">Liczba miejsc</label>
                        <input id="seats" name="seats" type="number"
                            class="form-control @if ($errors->first('seats')) is-invalid @endif"
                            value="{{ $screeningRoom->seats }}">
                        <div class="invalid-feedback">Nieprawidłowa liczba miejsc!</div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="number_of_rows" class="form-label">Liczba rzędów</label>
                        <input id="number_of_rows" name="number_of_rows" type="number"
                            class="form-control @if ($errors->first('rows')) is-invalid @endif"
                            value="{{ $screeningRoom->number_of_rows }}">
                        <div class="invalid-feedback">Nieprawidłowa liczba rzędów!</div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="price_for_seat" class="form-label">Cena za miejsce</label>
                        <input id="price_for_seat" name="price_for_seat" type="number"
                            class="form-control @if ($errors->first('price_for_seat')) is-invalid @endif"
                            value="{{ $screeningRoom->price_for_seat }}">
                        <div class="invalid-feedback">Nieprawidłowa cena za miejsce!</div>
                    </div>
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
