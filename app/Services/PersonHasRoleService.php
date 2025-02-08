<?php

namespace App\Services;

use App\Interfaces\Services\PersonHasRoleServiceInterface;
use App\Interfaces\Repositories\PersonHasRoleRepositoryInterface;

class PersonHasRoleService implements PersonHasRoleServiceInterface
{
    protected $serieRepository;

    public function __construct(PersonHasRoleRepositoryInterface $serieRepository)
    {
        $this->serieRepository = $serieRepository;
    }

    public function createPersonHasRole(array $data)
    {
        return $this->serieRepository->create($data);
    }

    public function deletePersonHasRole($id)
    {
        return $this->serieRepository->delete($id);
    }
}
