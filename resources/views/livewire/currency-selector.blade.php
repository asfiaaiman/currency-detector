<div>
    @if($currencyDetails)
        <div class="currency-info">
            <h3>Detected Currency for {{ $currencyDetails['country_name'] }}</h3>
            <p>Currency: {{ $currencyDetails['currency_name'] }} ({{ $currencyDetails['currency_code'] }})</p>
            <p>Symbol: {{ $currencyDetails['currency_symbol'] }}</p>
        </div>
    @else
        <div class="currency-error">
            {{ $message }}
        </div>
    @endif
</div>
