<?php

namespace App\Interfaces\Repositories;

interface PersonHasRoleRepositoryInterface
{
    public function create(array $data);
    public function delete($id);
}
