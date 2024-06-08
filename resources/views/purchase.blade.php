<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Potwierdzenie Rezerwacji</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
        }

        .summary {
            margin-top: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #f9f9f9;
        }

        .summary h3 {
            margin-bottom: 20px;
        }

        .summary p {
            margin-bottom: 10px;
        }

        .btn-primary {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="text-center">Potwierdzenie Rezerwacji</h1>
        <div class="summary">
            <h3>Szczegóły rezerwacji:</h3>
            <p><strong>Film:</strong> {{ $seance->film->name }}</p>
            <p><strong>Sala:</strong> {{ $seance->screeningRoom->id }}</p>
            <p><strong>Data i godzina:</strong> {{ \Carbon\Carbon::parse($seance->start_time)->format('d M Y, H:i') }}
            </p>
            <p><strong>Liczba miejsc:</strong> {{ count($seats) }}</p>
            <p><strong>Wybrane miejsca:</strong>
                @foreach ($seats as $seat)
                    rząd {{ $seat['row'] }} - miejsce {{ $seat['seat_in_row'] }}@if (!$loop->last)
                        ,
                    @endif
                @endforeach
            </p>
            <p><strong>Łączny koszt:</strong> <span id="totalPrice">{{ number_format($totalPrice, 2) }}</span> PLN</p>
        </div>
        <form method="POST" action="{{ route('confirm_purchase') }}">
            @csrf
            <input type="hidden" name="seance_id" value="{{ $seance->id }}">
            <input type="hidden" name="seats" value="{{ json_encode($seats) }}">
            <input type="hidden" id="totalPriceInput" name="total_price" value="{{ $totalPrice }}">
            <div class="form-group">
                <h3>Wybierz poczęstunki:</h3>
                @if ($products->isEmpty())
                    <p>Brak dostępnych produktów.</p>
                @else
                    @foreach ($products as $product)
                        <div class="form-check">
                            <input class="form-check-input product-checkbox" type="checkbox" name="products[]"
                                value="{{ $product->id }}" id="product-{{ $product->id }}"
                                data-price="{{ $product->price }}">
                            <label class="form-check-label" for="product-{{ $product->id }}">
                                {{ $product->name }} - {{ number_format($product->price, 2) }} PLN
                            </label>
                        </div>
                    @endforeach
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Potwierdź Rezerwację</button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const checkboxes = document.querySelectorAll('.product-checkbox');
            const totalPriceElement = document.getElementById('totalPrice');
            const totalPriceInput = document.getElementById('totalPriceInput');
            let totalPrice = parseFloat(totalPriceInput.value);

            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    const productPrice = parseFloat(this.dataset.price);
                    if (this.checked) {
                        totalPrice += productPrice;
                    } else {
                        totalPrice -= productPrice;
                    }
                    totalPriceElement.textContent = totalPrice.toFixed(2);
                    totalPriceInput.value = totalPrice.toFixed(2);
                });
            });
        });
    </script>
</body>

</html>
