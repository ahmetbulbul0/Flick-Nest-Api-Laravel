<?php

namespace App\Interfaces\Services;

interface PersonRoleServiceInterface
{
    public function getAllPersonRoles();
    public function getPersonRoleById($id);
    public function createPersonRole(array $data);
    public function updatePersonRole($id, array $data);
    public function deletePersonRole($id);
}
