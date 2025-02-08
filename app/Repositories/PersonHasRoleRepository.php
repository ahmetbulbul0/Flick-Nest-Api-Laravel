<?php

namespace App\Repositories;

use App\Models\PersonHasRole;
use App\Interfaces\Repositories\PersonHasRoleRepositoryInterface;

class PersonHasRoleRepository implements PersonHasRoleRepositoryInterface
{
    public function create(array $data)
    {
        return PersonHasRole::create($data);
    }

    public function delete($id)
    {
        $genre = PersonHasRole::findOrFail($id);
        $genre->delete();

        return true;
    }
}
