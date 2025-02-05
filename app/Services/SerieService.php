<?php

namespace App\Services;

use App\Interfaces\Services\SerieServiceInterface;
use App\Interfaces\Repositories\SerieRepositoryInterface;

class SerieService implements SerieServiceInterface
{
    protected $serieRepository;

    public function __construct(SerieRepositoryInterface $serieRepository)
    {
        $this->serieRepository = $serieRepository;
    }

    public function getAllSeries()
    {
        return $this->serieRepository->getAll();
    }

    public function getSerieById($id)
    {
        return $this->serieRepository->findById($id);
    }

    public function createSerie(array $data)
    {
        return $this->serieRepository->create($data);
    }

    public function updateSerie($id, array $data)
    {
        return $this->serieRepository->update($id, $data);
    }

    public function deleteSerie($id)
    {
        return $this->serieRepository->delete($id);
    }
}
