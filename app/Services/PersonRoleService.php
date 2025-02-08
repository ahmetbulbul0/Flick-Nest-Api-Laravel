<?php

namespace App\Services;

use App\Interfaces\Services\PersonRoleServiceInterface;
use App\Interfaces\Repositories\PersonRoleRepositoryInterface;

class PersonRoleService implements PersonRoleServiceInterface
{
    protected $personRoleRepository;

    public function __construct(PersonRoleRepositoryInterface $personRoleRepository)
    {
        $this->personRoleRepository = $personRoleRepository;
    }

    public function getAllPersonRoles()
    {
        return $this->personRoleRepository->getAll();
    }

    public function getPersonRoleById($id)
    {
        return $this->personRoleRepository->findById($id);
    }

    public function createPersonRole(array $data)
    {
        return $this->personRoleRepository->create($data);
    }

    public function updatePersonRole($id, array $data)
    {
        return $this->personRoleRepository->update($id, $data);
    }

    public function deletePersonRole($id)
    {
        return $this->personRoleRepository->delete($id);
    }
}
