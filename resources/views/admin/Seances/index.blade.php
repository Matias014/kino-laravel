<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seanse</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    @include('shared.navbar')
</head>

<body>
    <header>
        <h1>Seanse</h1>
    </header>

    @include('shared.navbar2')

    <div class="container mt-5 mb-5">
        @include('shared.session-error')

        <div class="row mb-2">
            <a href="{{ route('seances.create') }}">Dodaj nowy seans</a>
        </div>

        <div class="row">
            <div class="table-responsive-sm">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">ID Filmu</th>
                            <th scope="col">ID Sali Kinowej</th>
                            <th scope="col">ID Pracownika</th>
                            <th scope="col">ID Technologii</th>
                            <th scope="col">ID Promocji</th>
                            <th scope="col">Czas Rozpoczęcia</th>
                            <th scope="col">Czas Zakończenia</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($seances as $seance)
                            <tr>
                                <td>{{ $seance->id }}</td>
                                <td>{{ $seance->film_id }}</td>
                                <td>{{ $seance->screening_room_id }}</td>
                                <td>{{ $seance->worker_id }}</td>
                                <td>{{ $seance->technology_id }}</td>
                                <td>{{ $seance->promotion_id }}</td>
                                <td>{{ $seance->start_time }}</td>
                                <td>{{ $seance->end_time }}</td>
                                <td>
                                    <a href="{{ route('seances.edit', $seance->id) }}">Edycja</a>
                                </td>
                                <td>
                                    <form method="POST" action="{{ route('seances.destroy', $seance->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="btn btn-danger" value="Usuń"
                                            style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" />
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <th scope="row" colspan="10">Brak seansów.</th>
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
