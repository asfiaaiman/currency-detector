<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonPath = database_path('json/countries+states+cities.json');

        if (File::exists($jsonPath)) {
            $countries = json_decode(File::get($jsonPath), true);

            foreach ($countries as $country) {
                Country::updateOrCreate(
                    ['iso2' => $country['iso2']], // Unique constraint
                    [
                        'name' => $country['name'],
                        'currency' => $country['currency'] ?? null,
                        'currency_name' => $country['currency_name'] ?? null,
                        'currency_symbol' => $country['currency_symbol'] ?? null,
                    ]
                );
            }
        }
    }
}
