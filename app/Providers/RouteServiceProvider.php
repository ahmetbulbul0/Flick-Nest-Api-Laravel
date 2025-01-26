<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Rotayı yükleneceği namespace.
     */
    protected $namespace = 'App\\Http\\Controllers';

    /**
     * Uygulamanın route tanımları.
     */
    public function map()
    {
        $this->mapApiRoutes();
        $this->mapWebRoutes();
    }

    /**
     * API rotalarını yükler.
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api') // Tüm API rotalarına "api/" ön eki ekler.
            ->middleware('api') // Varsayılan API middleware grubu.
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }

    /**
     * Web rotalarını yükler.
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }
}
