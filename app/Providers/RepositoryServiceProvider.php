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
        $this->app->bind(\App\Interfaces\Repositories\SerieGenreRepositoryInterface::class, \App\Repositories\SerieGenreRepository::class);
        $this->app->bind(\App\Interfaces\Repositories\SerieSeasonRepositoryInterface::class, \App\Repositories\SerieSeasonRepository::class);
        $this->app->bind(\App\Interfaces\Repositories\PersonRepositoryInterface::class, \App\Repositories\PersonRepository::class);
        $this->app->bind(\App\Interfaces\Repositories\PersonRoleRepositoryInterface::class, \App\Repositories\PersonRoleRepository::class);
        $this->app->bind(\App\Interfaces\Repositories\PersonHasRoleRepositoryInterface::class, \App\Repositories\PersonHasRoleRepository::class);
        $this->app->bind(\App\Interfaces\Repositories\MoviePersonRepositoryInterface::class, \App\Repositories\MoviePersonRepository::class);
        $this->app->bind(\App\Interfaces\Repositories\SeriePersonRepositoryInterface::class, \App\Repositories\SeriePersonRepository::class);
        $this->app->bind(\App\Interfaces\Repositories\LanguageRepositoryInterface::class, \App\Repositories\LanguageRepository::class);
        $this->app->bind(\App\Interfaces\Repositories\PlatformRepositoryInterface::class, \App\Repositories\PlatformRepository::class);
        $this->app->bind(\App\Interfaces\Repositories\RoleRepositoryInterface::class, \App\Repositories\RoleRepository::class);
        $this->app->bind(\App\Interfaces\Repositories\CountryRepositoryInterface::class, \App\Repositories\CountryRepository::class);

        // Services
        $this->app->bind(\App\Interfaces\Services\GenreServiceInterface::class, \App\Services\GenreService::class);
        $this->app->bind(\App\Interfaces\Services\MovieServiceInterface::class, \App\Services\MovieService::class);
        $this->app->bind(\App\Interfaces\Services\MovieGenreServiceInterface::class, \App\Services\MovieGenreService::class);
        $this->app->bind(\App\Interfaces\Services\SerieServiceInterface::class, \App\Services\SerieService::class);
        $this->app->bind(\App\Interfaces\Services\SerieGenreServiceInterface::class, \App\Services\SerieGenreService::class);
        $this->app->bind(\App\Interfaces\Services\SerieSeasonServiceInterface::class, \App\Services\SerieSeasonService::class);
        $this->app->bind(\App\Interfaces\Services\PersonServiceInterface::class, \App\Services\PersonService::class);
        $this->app->bind(\App\Interfaces\Services\PersonRoleServiceInterface::class, \App\Services\PersonRoleService::class);
        $this->app->bind(\App\Interfaces\Services\PersonHasRoleServiceInterface::class, \App\Services\PersonHasRoleService::class);
        $this->app->bind(\App\Interfaces\Services\MoviePersonServiceInterface::class, \App\Services\MoviePersonService::class);
        $this->app->bind(\App\Interfaces\Services\SeriePersonServiceInterface::class, \App\Services\SeriePersonService::class);
        $this->app->bind(\App\Interfaces\Services\LanguageServiceInterface::class, \App\Services\LanguageService::class);
        $this->app->bind(\App\Interfaces\Services\PlatformServiceInterface::class, \App\Services\PlatformService::class);
        $this->app->bind(\App\Interfaces\Services\RoleServiceInterface::class, \App\Services\RoleService::class);
        $this->app->bind(\App\Interfaces\Services\CountryServiceInterface::class, \App\Services\CountryService::class);
    }
}
