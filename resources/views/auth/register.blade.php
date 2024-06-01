@include('shared.html')

@include('shared.head', ['pageTitle' => 'Zaloguj się'])

<body>
    @include('shared.navbar')

    <div class="container mt-5 mb-5">

        @include('shared.session-error')

        <div class="row mt-4 mb-4 text-center">
            <h1>Zarejestruj się</h1>
        </div>

        @include('shared.validation-error')

        <div class="row d-flex justify-content-center">
            <div class="col-10 col-sm-10 col-md-6 col-lg-4">
                <form method="POST" action="{{ route('login.authenticate') }}" class="needs-validation" novalidate>
                    @csrf
                    <div class="form-group mb-2">
                        <label for="name" class="form-label">Imię</label>
                        <input id="name" name="name" type="text" class="form-control @if ($errors->first('name')) is-invalid @endif" value="{{ old('name') }}">
                        <div class="invalid-feedback">Nieprawidłowe imię!</div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="email" class="form-label">Email</label>
                        <input id="email" name="email" type="text" class="form-control @if ($errors->first('email')) is-invalid @endif" value="{{ old('email') }}">
                        <div class="invalid-feedback">Nieprawidłowy email!</div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="password" class="form-label">Hasło</label>
                        <input id="password" name="password" type="password" class="form-control @if ($errors->first('password')) is-invalid @endif">
                        <div class="invalid-feedback">Nieprawidłowe hasło!</div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="password2" class="form-label">Potwierdź hasło</label>
                        <input id="password2" name="password2" type="password2" class="form-control @if ($errors->first('password2')) is-invalid @endif">
                        <div class="invalid-feedback">Nieprawidłowe hasło!</div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="country" class="form-label">Kraj</label>
                        <input id="country" name="country" type="country" class="form-control @if ($errors->first('country')) is-invalid @endif">
                        <div class="invalid-feedback">Nieprawidłowy kraj!</div>
                    </div>
                    <div class="text-center mt-4 mb-4">
                        <input class="btn btn-primary" type="submit" value="Wyślij">
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('shared.footer')
</body>

</html>

