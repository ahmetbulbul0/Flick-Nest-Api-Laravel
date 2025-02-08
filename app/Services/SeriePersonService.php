<?php

namespace App\Services;

use App\Interfaces\Services\SeriePersonServiceInterface;
use App\Interfaces\Repositories\SeriePersonRepositoryInterface;

class SeriePersonService implements SeriePersonServiceInterface
{
    protected $seriePersonRepository;

    public function __construct(SeriePersonRepositoryInterface $seriePersonRepository)
    {
        $this->seriePersonRepository = $seriePersonRepository;
    }

    public function getAllSeriePersons()
    {
        return $this->seriePersonRepository->getAll();
    }

    public function getSeriePersonById($id)
    {
        return $this->seriePersonRepository->findById($id);
    }

    public function createSeriePerson(array $data)
    {
        return $this->seriePersonRepository->create($data);
    }

    public function updateSeriePerson($id, array $data)
    {
        return $this->seriePersonRepository->update($id, $data);
    }

    public function deleteSeriePerson($id)
    {
        return $this->seriePersonRepository->delete($id);
    }
}
