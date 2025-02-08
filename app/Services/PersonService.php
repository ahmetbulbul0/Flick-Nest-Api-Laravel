<?php

namespace App\Services;

use App\Interfaces\Services\PersonServiceInterface;
use App\Interfaces\Repositories\PersonRepositoryInterface;

class PersonService implements PersonServiceInterface
{
    protected $personRepository;

    public function __construct(PersonRepositoryInterface $personRepository)
    {
        $this->personRepository = $personRepository;
    }

    public function getAllPersons()
    {
        return $this->personRepository->getAll();
    }

    public function getPersonById($id)
    {
        return $this->personRepository->findById($id);
    }

    public function createPerson(array $data)
    {
        return $this->personRepository->create($data);
    }

    public function updatePerson($id, array $data)
    {
        return $this->personRepository->update($id, $data);
    }

    public function deletePerson($id)
    {
        return $this->personRepository->delete($id);
    }
}
