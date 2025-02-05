<?php

namespace App\Services;

use App\Interfaces\Services\SerieSeasonServiceInterface;
use App\Interfaces\Repositories\SerieSeasonRepositoryInterface;

class SerieSeasonService implements SerieSeasonServiceInterface
{
    protected $serieSeasonRepository;

    public function __construct(SerieSeasonRepositoryInterface $serieSeasonRepository)
    {
        $this->serieSeasonRepository = $serieSeasonRepository;
    }

    public function getAllSerieSeasons()
    {
        return $this->serieSeasonRepository->getAll();
    }

    public function getSerieSeasonById($id)
    {
        return $this->serieSeasonRepository->findById($id);
    }

    public function createSerieSeason(array $data)
    {
        return $this->serieSeasonRepository->create($data);
    }

    public function updateSerieSeason($id, array $data)
    {
        return $this->serieSeasonRepository->update($id, $data);
    }

    public function deleteSerieSeason($id)
    {
        return $this->serieSeasonRepository->delete($id);
    }
}
