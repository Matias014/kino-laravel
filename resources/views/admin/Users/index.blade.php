<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Użytkownicy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    @include('shared.navbar')
</head>

<body>
    <header>
        <h1>Użytkownicy</h1>
    </header>

    @include('shared.navbar2')

    <div class="container mt-5 mb-5">
        @include('shared.session-error')

        <div class="row mb-2">
            <a href="{{ route('users.create') }}">Dodaj nowego użytkownika</a>
        </div>

        <div class="row">
            <div class="table-responsive-sm">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Imię</th>
                            <th scope="col">Nazwisko</th>
                            <th scope="col">Email</th>
                            <th scope="col">Numer telefonu</th>
                            <th scope="col">Rola</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td>{{ $user['ID'] }}</td>
                                <td>{{ $user['NAME'] }}</td>
                                <td>{{ $user['SURNAME'] }}</td>
                                <td>{{ $user['EMAIL'] }}</td>
                                <td>{{ $user['PHONE_NUMBER'] }}</td>
                                <td>{{ $user['ROLE'] }}</td>
                                <td>
                                    <a href="{{ route('users.edit', $user['ID']) }}">Edycja</a>
                                </td>
                                <td>
                                    @if ($user['ROLE'] == "admin")
                                        @continue
                                    @endif
                                    <form method="POST" action="{{ route('users.destroy', $user['ID']) }}">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="btn btn-danger" value="Usuń"
                                            style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" />
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <th scope="row" colspan="8">Brak użytkowników.</th>
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
