<?php

namespace App\Interfaces\Services;

interface CountryServiceInterface
{
    public function getAllCountries();
    public function getActiveCountries();
    public function getCountryById(int $id);
    public function getCountryByIso2(string $code);
    public function getCountryByIso3(string $code);
    public function createCountry(array $data);
    public function updateCountry(int $id, array $data);
    public function deleteCountry(int $id);
    public function restoreCountry(int $id);
    public function forceDeleteCountry(int $id);
    public function getCountriesByRegion(string $region);
    public function getCountriesBySubregion(string $subregion);
    public function searchCountries(string $term);
    public function updateCountriesOrder(array $order);
    public function toggleCountryStatus(int $id);
    public function getAvailableRegions();
    public function getAvailableSubregions(string $region);
    public function validateCountryData(array $data): bool;
    public function formatCountryResponse($country): array;
}
