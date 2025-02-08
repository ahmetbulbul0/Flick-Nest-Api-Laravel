<?php

namespace App\Repositories;

use App\Models\PersonRole;
use App\Interfaces\Repositories\PersonRoleRepositoryInterface;

class PersonRoleRepository implements PersonRoleRepositoryInterface
{
    public function getAll()
    {
        return PersonRole::all();
    }

    public function findById($id)
    {
        return PersonRole::findOrFail($id);
    }

    public function create(array $data)
    {
        return PersonRole::create($data);
    }

    public function update($id, array $data)
    {
        $genre = PersonRole::findOrFail($id);
        $genre->update($data);

        return $genre;
    }

    public function delete($id)
    {
        $genre = PersonRole::findOrFail($id);
        $genre->delete();

        return true;
    }
}
