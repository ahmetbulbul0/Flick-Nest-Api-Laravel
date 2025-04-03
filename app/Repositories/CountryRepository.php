<?php

namespace App\Repositories;

use App\Models\Country;
use Illuminate\Support\Collection;
use App\Interfaces\Repositories\CountryRepositoryInterface;

class CountryRepository implements CountryRepositoryInterface
{
    protected $model;

    public function __construct(Country $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->ordered()->get();
    }

    public function getAllActive()
    {
        return $this->model->active()->ordered()->get();
    }

    public function findById(int $id)
    {
        return $this->model->findOrFail($id);
    }

    public function findByIso2(string $code)
    {
        return $this->model->where('iso_code_2', strtoupper($code))->first();
    }

    public function findByIso3(string $code)
    {
        return $this->model->where('iso_code_3', strtoupper($code))->first();
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(int $id, array $data)
    {
        $country = $this->findById($id);
        $country->update($data);
        return $country;
    }

    public function delete(int $id)
    {
        $country = $this->findById($id);
        return $country->delete();
    }

    public function restore(int $id)
    {
        return $this->model->withTrashed()->findOrFail($id)->restore();
    }

    public function forceDelete(int $id)
    {
        $country = $this->model->withTrashed()->findOrFail($id);
        return $country->forceDelete();
    }

    public function getByRegion(string $region)
    {
        return $this->model->byRegion($region)->ordered()->get();
    }

    public function getBySubregion(string $subregion)
    {
        return $this->model->bySubregion($subregion)->ordered()->get();
    }

    public function search(string $term)
    {
        return $this->model->search($term)->ordered()->get();
    }

    public function updateOrder(array $order)
    {
        \DB::transaction(function () use ($order) {
            foreach ($order as $id => $position) {
                $this->model->where('id', $id)->update(['display_order' => $position]);
            }
        });
        return true;
    }

    public function toggleActive(int $id)
    {
        $country = $this->findById($id);
        $country->is_active = !$country->is_active;
        $country->save();
        return $country;
    }

    public function getRegions()
    {
        return $this->model->distinct()->whereNotNull('region')->pluck('region');
    }

    public function getSubregions(string $region)
    {
        return $this->model->where('region', $region)
                          ->distinct()
                          ->whereNotNull('subregion')
                          ->pluck('subregion');
    }
}
