<?php

namespace App\Repositories;

use App\Models\Movie;
use Illuminate\Support\Str;
use App\Interfaces\Repositories\MovieRepositoryInterface;

class MovieRepository implements MovieRepositoryInterface
{
    public function getAll()
    {
        return Movie::all();
    }

    public function findById($id)
    {
        return Movie::findOrFail($id);
    }

    public function create(array $data)
    {
        if (isset($data["poster"])) {
            $poster = $data["poster"];
            $data["poster"] = $poster->store('uploads/movie-posters', 'public');
        }

        return Movie::create($data);
    }

    public function update($id, array $data)
    {
        $movie = Movie::findOrFail($id);

        if (isset($data["poster"])) {
            $poster = $data["poster"];
            $data["poster"] = $poster->store('uploads/movie-posters', 'public');
        }

        if ($data["title"] != $movie->title && !isset($data["slug"])) {
            $data["slug"] = Str::slug($data["title"]);
        }

        $movie->update($data);

        return $movie;
    }

    public function delete($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->delete();

        return true;
    }
}
