<?php

namespace App\Services;

use App\Interfaces\Services\SerieServiceInterface;
use App\Interfaces\Repositories\SerieRepositoryInterface;

class SerieService implements SerieServiceInterface
{
    protected $movieRepository;

    public function __construct(SerieRepositoryInterface $movieRepository)
    {
        $this->movieRepository = $movieRepository;
    }

    public function getAllSeries()
    {
        return $this->movieRepository->getAll();
    }

    public function getSerieById($id)
    {
        return $this->movieRepository->findById($id);
    }

    public function createSerie(array $data)
    {
        return $this->movieRepository->create($data);
    }

    public function updateSerie($id, array $data)
    {
        return $this->movieRepository->update($id, $data);
    }

    public function deleteSerie($id)
    {
        return $this->movieRepository->delete($id);
    }
}
