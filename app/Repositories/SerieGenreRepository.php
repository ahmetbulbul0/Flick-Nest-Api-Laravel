<?php

namespace App\Repositories;

use App\Models\SerieGenre;
use App\Interfaces\Repositories\SerieGenreRepositoryInterface;

class SerieGenreRepository implements SerieGenreRepositoryInterface
{
    public function create(array $data)
    {
        return SerieGenre::create($data);
    }

    public function delete($id)
    {
        $genre = SerieGenre::findOrFail($id);
        $genre->delete();

        return true;
    }
}
