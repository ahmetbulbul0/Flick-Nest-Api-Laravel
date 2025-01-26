<?php

namespace App\Providers;

use App\Services\GenreService;
use App\Repositories\GenreRepository;
use Illuminate\Support\ServiceProvider;
use App\Interfaces\Services\GenreServiceInterface;
use App\Interfaces\Repositories\GenreRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(GenreRepositoryInterface::class, GenreRepository::class);
        $this->app->bind(GenreServiceInterface::class, GenreService::class);
    }
}
