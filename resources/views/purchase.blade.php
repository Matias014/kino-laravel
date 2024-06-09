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
            <p><strong>Łączny koszt bez promocji:</strong> <span
                    id="totalBasePrice">{{ number_format($totalBasePrice, 2) }}</span> PLN</p>
            <p><strong>Wartość promocji ({{ $seance->promotion->discount }}%):</strong> <span
                    id="totalDiscount">{{ number_format($totalDiscount, 2) }}</span> PLN</p>
            <p><strong>Łączny koszt po promocji:</strong> <span
                    id="totalFinalPrice">{{ number_format($totalFinalPrice, 2) }}</span> PLN</p>
        </div>
        @include('shared.session-error')
        @include('shared.validation-error')
        <form method="POST" action="{{ route('confirm_purchase') }}">
            @csrf
            <input type="hidden" name="seance_id" value="{{ $seance->id }}">
            <input type="hidden" name="seats" value="{{ json_encode($seats) }}">
            <input type="hidden" id="totalFinalPriceInput" name="total_price" value="{{ $totalFinalPrice }}">
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
            <div class="form-group">
                <h3>Wybierz voucher:</h3>
                <select class="form-select" name="voucher_id" id="voucherSelect">
                    <option value="" data-discount="0">Nie wybieraj vouchera</option>
                    @foreach ($vouchers as $voucher)
                        <option value="{{ $voucher->id }}" data-discount="{{ $voucher->discount }}">
                            {{ $voucher->name }} - Zniżka: {{ $voucher->discount }}%</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Potwierdź Rezerwację</button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const checkboxes = document.querySelectorAll('.product-checkbox');
            const totalFinalPriceElement = document.getElementById('totalFinalPrice');
            const totalFinalPriceInput = document.getElementById('totalFinalPriceInput');
            const voucherSelect = document.getElementById('voucherSelect');
            let totalFinalPrice = parseFloat(totalFinalPriceInput.value);
            const basePrice = totalFinalPrice;

            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    const productPrice = parseFloat(this.dataset.price);
                    if (this.checked) {
                        totalFinalPrice += productPrice;
                    } else {
                        totalFinalPrice -= productPrice;
                    }
                    updateFinalPrice();
                });
            });

            voucherSelect.addEventListener('change', function() {
                updateFinalPrice();
            });

            function updateFinalPrice() {
                const selectedVoucher = voucherSelect.options[voucherSelect.selectedIndex];
                const discount = parseFloat(selectedVoucher.dataset.discount);
                totalFinalPrice = basePrice;

                checkboxes.forEach(checkbox => {
                    if (checkbox.checked) {
                        totalFinalPrice += parseFloat(checkbox.dataset.price);
                    }
                });

                if (discount > 0) {
                    totalFinalPrice -= (totalFinalPrice * discount / 100);
                }

                totalFinalPriceElement.textContent = totalFinalPrice.toFixed(2);
                totalFinalPriceInput.value = totalFinalPrice.toFixed(2);
            }
        });
    </script>
</body>

</html>
