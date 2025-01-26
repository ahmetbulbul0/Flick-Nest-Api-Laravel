<?php

namespace App\Services;

use App\Interfaces\Services\GenreServiceInterface;
use App\Interfaces\Repositories\GenreRepositoryInterface;

class GenreService implements GenreServiceInterface
{
    protected $genreRepository;

    public function __construct(GenreRepositoryInterface $genreRepository)
    {
        $this->genreRepository = $genreRepository;
    }

    public function getAllGenres()
    {
        return $this->genreRepository->getAll();
    }

    public function getGenreById($id)
    {
        return $this->genreRepository->findById($id);
    }

    public function createGenre(array $data)
    {
        return $this->genreRepository->create($data);
    }

    public function updateGenre($id, array $data)
    {
        return $this->genreRepository->update($id, $data);
    }

    public function deleteGenre($id)
    {
        return $this->genreRepository->delete($id);
    }
}
