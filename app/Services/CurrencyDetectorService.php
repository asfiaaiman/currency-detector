<?php

namespace App\Services;

use App\Models\Country;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;

class CurrencyDetectorService
{
    private string $ipAddress;
    private Collection $countriesData;

    public function __construct()
    {
        $this->loadCountriesData();
    }

    private function loadCountriesData(): void
    {
        $this->countriesData = Cache::remember('countries_data', 86400, function () {
            return Country::select('name', 'iso2', 'currency', 'currency_name', 'currency_symbol')->get();
        });
    }

    public function detectCurrencyFromIp(string $ipAddress): ?array
    {
        $this->ipAddress = $ipAddress;
        $countryCode = $this->getCountryCodeFromIp();

        if (!$countryCode) {
            return null;
        }

        return $this->getCurrencyDetails($countryCode);
    }

    private function getCountryCodeFromIp(): ?string
    {
        try {
            $response = Http::get("http://ip-api.com/json/{$this->ipAddress}");

            if ($response->successful()) {
                return $response->json('countryCode');
            }

            return null;
        } catch (\Exception $e) {
            report($e);
            return null;
        }
    }

    private function getCurrencyDetails(string $countryCode): ?array
    {
        $country = $this->countriesData->firstWhere('iso2', $countryCode);

        if (!$country) {
            return null;
        }

        return [
            'currency_code' => $country['currency'],
            'currency_name' => $country['currency_name'],
            'currency_symbol' => $country['currency_symbol'],
            'country_name' => $country['name']
        ];
    }
}
