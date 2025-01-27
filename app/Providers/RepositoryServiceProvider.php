<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Repositories
        $this->app->bind(\App\Interfaces\Repositories\GenreRepositoryInterface::class, \App\Repositories\GenreRepository::class);
        $this->app->bind(\App\Interfaces\Repositories\MovieRepositoryInterface::class, \App\Repositories\MovieRepository::class);
        $this->app->bind(\App\Interfaces\Repositories\MovieGenreRepositoryInterface::class, \App\Repositories\MovieGenreRepository::class);
        $this->app->bind(\App\Interfaces\Repositories\SerieRepositoryInterface::class, \App\Repositories\SerieRepository::class);

        // Services
        $this->app->bind(\App\Interfaces\Services\GenreServiceInterface::class, \App\Services\GenreService::class);
        $this->app->bind(\App\Interfaces\Services\MovieServiceInterface::class, \App\Services\MovieService::class);
        $this->app->bind(\App\Interfaces\Services\MovieGenreServiceInterface::class, \App\Services\MovieGenreService::class);
        $this->app->bind(\App\Interfaces\Services\SerieServiceInterface::class, \App\Services\SerieService::class);
    }
}
