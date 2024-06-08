<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edycja filmu {{ $film->name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    @include('shared.navbar')
</head>

<body>
    <header>
        <h1>Edycja filmu {{ $film->name }}</h1>
    </header>
    @include('shared.navbar2')

    <div class="container mt-5 mb-5">

        @include('shared.session-error')

        <div class="row d-flex justify-content-center">
            <div class="col-6">
                @include('shared.validation-error')
                <form method="POST" action="{{ route('films.update', $film->id) }}" class="needs-validation"
                    enctype="multipart/form-data" novalidate>
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-2">
                        <label for="name" class="form-label">Nazwa</label>
                        <input id="name" name="name" type="text"
                            class="form-control @if ($errors->first('name')) is-invalid @endif"
                            value="{{ $film->name }}">
                        <div class="invalid-feedback">Nieprawidłowa nazwa!</div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="description" class="form-label">Opis</label>
                        <textarea id="description" name="description" class="form-control @if ($errors->first('description')) is-invalid @endif">{{ $film->description }}</textarea>
                        <div class="invalid-feedback">Nieprawidłowy opis!</div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="duration" class="form-label">Czas trwania (w minutach)</label>
                        <input id="duration" name="duration" type="text"
                            class="form-control @if ($errors->first('duration')) is-invalid @endif"
                            value="{{ $film->duration }}">
                        <div class="invalid-feedback">Nieprawidłowy czas trwania!</div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="genre" class="form-label">Gatunek</label>
                        <input id="genre" name="genre" type="text"
                            class="form-control @if ($errors->first('genre')) is-invalid @endif"
                            value="{{ $film->genre }}">
                        <div class="invalid-feedback">Nieprawidłowy gatunek!</div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="img" class="form-label">Obrazek</label>
                        <input id="img" name="img" type="file"
                            class="form-control @if ($errors->first('img')) is-invalid @endif">
                        <div class="invalid-feedback">Nieprawidłowy obrazek!</div>
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
