<?php

namespace App\Services;

use App\Interfaces\Services\MovieGenreServiceInterface;
use App\Interfaces\Repositories\MovieGenreRepositoryInterface;

class MovieGenreService implements MovieGenreServiceInterface
{
    protected $movieRepository;

    public function __construct(MovieGenreRepositoryInterface $movieRepository)
    {
        $this->movieRepository = $movieRepository;
    }

    public function createMovieGenre(array $data)
    {
        return $this->movieRepository->create($data);
    }

    public function deleteMovieGenre($id)
    {
        return $this->movieRepository->delete($id);
    }
}
