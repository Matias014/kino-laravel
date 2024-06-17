<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edytuj dane</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    @include('shared.navbar')
</head>

<body>
    @include('shared.navbar2')
    <div class="container mt-5">
        <h1 class="text-center">Edytuj swoje dane</h1>
        @include('shared.session-error')
        @include('shared.validation-error')
        <form method="POST" action="{{ route('user.update') }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Imię</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}"
                    required maxlength="30">
            </div>
            <div class="mb-3">
                <label for="surname" class="form-label">Nazwisko</label>
                <input type="text" class="form-control" id="surname" name="surname" value="{{ $user->surname }}"
                    required maxlength="30">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}"
                    required maxlength="40">
            </div>
            <div class="mb-3">
                <label for="phone_number" class="form-label">Numer telefonu</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number"
                    value="{{ $user->phone_number }}" required maxlength="15">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Nowe hasło (pozostaw puste, jeśli nie chcesz zmieniać)</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Zapisz</button>
        </form>
    </div>
    @include('shared.footer')
</body>

</html>
