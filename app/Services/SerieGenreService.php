<?php

namespace App\Services;

use App\Interfaces\Services\SerieGenreServiceInterface;
use App\Interfaces\Repositories\SerieGenreRepositoryInterface;

class SerieGenreService implements SerieGenreServiceInterface
{
    protected $serieRepository;

    public function __construct(SerieGenreRepositoryInterface $serieRepository)
    {
        $this->serieRepository = $serieRepository;
    }

    public function createSerieGenre(array $data)
    {
        return $this->serieRepository->create($data);
    }

    public function deleteSerieGenre($id)
    {
        return $this->serieRepository->delete($id);
    }
}
