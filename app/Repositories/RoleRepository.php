<?php

namespace App\Repositories;

use App\Models\Role;
use App\Interfaces\Repositories\RoleRepositoryInterface;

class RoleRepository implements RoleRepositoryInterface
{
    public function getAll()
    {
        return Role::all();
    }

    public function findById($id)
    {
        return Role::findOrFail($id);
    }

    public function create(array $data)
    {
        return Role::create($data);
    }

    public function update($id, array $data)
    {
        $role = Role::findOrFail($id);
        $role->update($data);

        return $role;
    }

    public function delete($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return true;
    }
}
