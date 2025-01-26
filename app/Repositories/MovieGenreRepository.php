<?php

namespace App\Repositories;

use App\Models\MovieGenre;
use App\Interfaces\Repositories\MovieGenreRepositoryInterface;

class MovieGenreRepository implements MovieGenreRepositoryInterface
{
    public function create(array $data)
    {
        return MovieGenre::create($data);
    }

    public function delete($id)
    {
        $genre = MovieGenre::findOrFail($id);
        $genre->delete();

        return true;
    }
}
