<?php

namespace App\Interfaces\Services;

interface PersonHasRoleServiceInterface
{
    public function createPersonHasRole(array $data);
    public function deletePersonHasRole($id);
}
