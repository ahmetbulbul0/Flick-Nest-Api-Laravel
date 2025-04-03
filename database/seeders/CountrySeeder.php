<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    public function run(): void
    {
        $countries = [
            [
                'iso_code_2' => 'TR',
                'iso_code_3' => 'TUR',
                'iso_numeric' => '792',
                'name' => 'Turkey',
                'native_name' => 'Türkiye',
                'capital' => 'Ankara',
                'region' => 'Asia',
                'subregion' => 'Western Asia',
                'phone_code' => '90',
                'currency_code' => 'TRY',
                'currency_symbol' => '₺',
                'flag_emoji' => '🇹🇷',
                'latitude' => 39.0000,
                'longitude' => 35.0000,
                'timezone' => 'Europe/Istanbul',
                'is_active' => true,
                'display_order' => 1
            ],
            [
                'iso_code_2' => 'US',
                'iso_code_3' => 'USA',
                'iso_numeric' => '840',
                'name' => 'United States',
                'native_name' => 'United States of America',
                'capital' => 'Washington, D.C.',
                'region' => 'Americas',
                'subregion' => 'Northern America',
                'phone_code' => '1',
                'currency_code' => 'USD',
                'currency_symbol' => '$',
                'flag_emoji' => '🇺🇸',
                'latitude' => 38.0000,
                'longitude' => -97.0000,
                'timezone' => 'America/New_York',
                'is_active' => true,
                'display_order' => 2
            ],
            [
                'iso_code_2' => 'GB',
                'iso_code_3' => 'GBR',
                'iso_numeric' => '826',
                'name' => 'United Kingdom',
                'native_name' => 'United Kingdom',
                'capital' => 'London',
                'region' => 'Europe',
                'subregion' => 'Northern Europe',
                'phone_code' => '44',
                'currency_code' => 'GBP',
                'currency_symbol' => '£',
                'flag_emoji' => '🇬🇧',
                'latitude' => 54.0000,
                'longitude' => -2.0000,
                'timezone' => 'Europe/London',
                'is_active' => true,
                'display_order' => 3
            ],
            [
                'iso_code_2' => 'DE',
                'iso_code_3' => 'DEU',
                'iso_numeric' => '276',
                'name' => 'Germany',
                'native_name' => 'Deutschland',
                'capital' => 'Berlin',
                'region' => 'Europe',
                'subregion' => 'Western Europe',
                'phone_code' => '49',
                'currency_code' => 'EUR',
                'currency_symbol' => '€',
                'flag_emoji' => '🇩🇪',
                'latitude' => 51.0000,
                'longitude' => 9.0000,
                'timezone' => 'Europe/Berlin',
                'is_active' => true,
                'display_order' => 4
            ],
            [
                'iso_code_2' => 'FR',
                'iso_code_3' => 'FRA',
                'iso_numeric' => '250',
                'name' => 'France',
                'native_name' => 'France',
                'capital' => 'Paris',
                'region' => 'Europe',
                'subregion' => 'Western Europe',
                'phone_code' => '33',
                'currency_code' => 'EUR',
                'currency_symbol' => '€',
                'flag_emoji' => '🇫🇷',
                'latitude' => 46.0000,
                'longitude' => 2.0000,
                'timezone' => 'Europe/Paris',
                'is_active' => true,
                'display_order' => 5
            ],
            // Daha fazla ülke eklenebilir...
        ];

        foreach ($countries as $country) {
            Country::create($country);
        }
    }
}
