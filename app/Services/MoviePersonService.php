<?php

namespace App\Services;

use App\Interfaces\Services\MoviePersonServiceInterface;
use App\Interfaces\Repositories\MoviePersonRepositoryInterface;

class MoviePersonService implements MoviePersonServiceInterface
{
    protected $moviePersonRepository;

    public function __construct(MoviePersonRepositoryInterface $moviePersonRepository)
    {
        $this->moviePersonRepository = $moviePersonRepository;
    }

    public function getAllMoviePersons()
    {
        return $this->moviePersonRepository->getAll();
    }

    public function getMoviePersonById($id)
    {
        return $this->moviePersonRepository->findById($id);
    }

    public function createMoviePerson(array $data)
    {
        return $this->moviePersonRepository->create($data);
    }

    public function updateMoviePerson($id, array $data)
    {
        return $this->moviePersonRepository->update($id, $data);
    }

    public function deleteMoviePerson($id)
    {
        return $this->moviePersonRepository->delete($id);
    }
}
