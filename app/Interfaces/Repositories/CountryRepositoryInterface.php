<?php

namespace App\Interfaces\Repositories;

interface CountryRepositoryInterface
{
    public function getAll();
    public function getAllActive();
    public function findById(int $id);
    public function findByIso2(string $code);
    public function findByIso3(string $code);
    public function create(array $data);
    public function update(int $id, array $data);
    public function delete(int $id);
    public function restore(int $id);
    public function forceDelete(int $id);
    public function getByRegion(string $region);
    public function getBySubregion(string $subregion);
    public function search(string $term);
    public function updateOrder(array $order);
    public function toggleActive(int $id);
    public function getRegions();
    public function getSubregions(string $region);
}
