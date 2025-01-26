<?php

namespace App\Repositories;

use App\Models\Genre;
use App\Interfaces\Repositories\GenreRepositoryInterface;

class GenreRepository implements GenreRepositoryInterface
{
    public function getAll()
    {
        return Genre::all();
    }

    public function findById($id)
    {
        return Genre::findOrFail($id);
    }

    public function create(array $data)
    {
        return Genre::create($data);
    }

    public function update($id, array $data)
    {
        $genre = Genre::findOrFail($id);
        $genre->update($data);

        return $genre;
    }

    public function delete($id)
    {
        $genre = Genre::findOrFail($id);
        $genre->delete();

        return true;
    }
}
