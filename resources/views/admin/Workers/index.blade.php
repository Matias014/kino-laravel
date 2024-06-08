<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pracownicy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    @include('shared.navbar')
</head>

<body>
    <header>
        <h1>Pracownicy</h1>
    </header>

    @include('shared.navbar2')

    <div class="container mt-5 mb-5">
        @include('shared.session-error')

        <div class="row mb-2">
            <a href="{{ route('workers.create') }}">Dodaj nowego pracownika</a>
        </div>

        <div class="row">
            <div class="table-responsive-sm">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Imię</th>
                            <th scope="col">Nazwisko</th>
                            {{-- <th scope="col">Czas rozpoczęcia</th>
                            <th scope="col">Czas zakończenia</th> --}}
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($workers as $worker)
                            <tr>
                                <td>{{ $worker->id }}</td>
                                <td>{{ $worker->name }}</td>
                                <td>{{ $worker->surname }}</td>
                                {{-- <td>{{ $worker->start_time }}</td>
                                <td>{{ $worker->end_time }}</td> --}}
                                <td>
                                    <a href="{{ route('workers.edit', $worker->id) }}">Edycja</a>
                                </td>
                                <td>
                                    <form method="POST" action="{{ route('workers.destroy', $worker->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="btn btn-danger" value="Usuń"
                                            style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" />
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <th scope="row" colspan="7">Brak pracowników.</th>
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
