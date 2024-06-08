<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edycja Biletu {{ $ticket->id }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    @include('shared.navbar')
</head>

<body>
    <header>
        <h1>Edycja Biletu {{ $ticket->id }}</h1>
    </header>

    @include('shared.navbar2')

    <div class="container mt-5 mb-5">

        @include('shared.session-error')

        <div class="row d-flex justify-content-center">
            <div class="col-6">
                @include('shared.validation-error')
                <form method="POST" action="{{ route('tickets.update', $ticket->id) }}" class="needs-validation"
                    novalidate>
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-2">
                        <label for="reservation_id" class="form-label">ID Rezerwacji</label>
                        <input id="reservation_id" name="reservation_id" type="text"
                            class="form-control @if ($errors->first('reservation_id')) is-invalid @endif"
                            value="{{ $ticket->reservation_id }}">
                        <div class="invalid-feedback">Nieprawidłowy ID rezerwacji!</div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="voucher_id" class="form-label">ID Vouchera</label>
                        <input id="voucher_id" name="voucher_id" type="text"
                            class="form-control @if ($errors->first('voucher_id')) is-invalid @endif"
                            value="{{ $ticket->voucher_id }}">
                        <div class="invalid-feedback">Nieprawidłowy ID vouchera!</div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="price" class="form-label">Cena</label>
                        <input id="price" name="price" type="text"
                            class="form-control @if ($errors->first('price')) is-invalid @endif"
                            value="{{ $ticket->price }}">
                        <div class="invalid-feedback">Nieprawidłowa cena!</div>
                    </div>
                    {{-- <div class="form-group mb-2">
                        <label for="status_of_payment" class="form-label">Status płatności</label>
                        <select id="status_of_payment" name="status_of_payment"
                            class="form-control @if ($errors->first('status_of_payment')) is-invalid @endif">
                            <option value="T" {{ $ticket->status_of_payment == 'T' ? 'selected' : '' }}>Tak
                            </option>
                            <option value="N" {{ $ticket->status_of_payment == 'N' ? 'selected' : '' }}>Nie
                            </option>
                        </select>
                        <div class="invalid-feedback">Nieprawidłowy wybór statusu płatności!</div>
                    </div> --}}
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
