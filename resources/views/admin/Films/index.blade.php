<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filmy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    @include('shared.navbar')
</head>

<body class="d-flex flex-column min-vh-100">
    <header>
        <h1>Filmy</h1>
    </header>

    @include('shared.navbar2')

    <div class="container mt-5 mb-5 flex-grow-1">
        <div class="row mb-2">
            <a href="{{ route('films.create') }}">Dodaj nowy film</a>
        </div>
        @include('shared.session-error')
        <div class="row">
            <div class="table-responsive-sm">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nazwa</th>
                            <th scope="col">Opis</th>
                            <th scope="col">Czas trwania</th>
                            <th scope="col">Gatunek</th>
                            <th scope="col">Zdjęcie</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($films as $film)
                            <tr>
                                <td>{{ $film->id }}</td>
                                <td>{{ $film->name }}</td>
                                <td>{{ $film->description }}</td>
                                <td>{{ $film->duration }} minut</td>
                                <td>{{ $film->genre }}</td>
                                <td>{{ $film->img }}</td>
                                <td>
                                    <a href="{{ route('films.edit', $film) }}">Edycja</a>
                                </td>
                                <td>
                                    <form method="POST" action="{{ route('films.destroy', $film->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="btn btn-danger" value="Usuń"
                                            style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" />
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <th scope="row" colspan="8">Brak filmów.</th>
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
