<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edycja Rezerwacji Produktu {{ $reservationProduct->id }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    @include('shared.navbar')
</head>

<body>
    <header>
        <h1>Edycja Rezerwacji Produktu {{ $reservationProduct->id }}</h1>
    </header>

    @include('shared.navbar2')

    <div class="container mt-5 mb-5">

        @include('shared.session-error')

        <div class="row d-flex justify-content-center">
            <div class="col-6">
                @include('shared.validation-error')
                <form method="POST" action="{{ route('reservation_products.update', $reservationProduct->id) }}"
                    class="needs-validation" novalidate>
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-2">
                        <label for="product_id" class="form-label">ID Produktu</label>
                        <input id="product_id" name="product_id" type="text"
                            class="form-control @if ($errors->first('product_id')) is-invalid @endif"
                            value="{{ $reservationProduct->product_id }}">
                        <div class="invalid-feedback">Nieprawidłowy ID produktu!</div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="reservation_id" class="form-label">ID Rezerwacji</label>
                        <input id="reservation_id" name="reservation_id" type="text"
                            class="form-control @if ($errors->first('reservation_id')) is-invalid @endif"
                            value="{{ $reservationProduct->reservation_id }}">
                        <div class="invalid-feedback">Nieprawidłowy ID rezerwacji!</div>
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
