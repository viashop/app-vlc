<?php

namespace Modeling\Applications\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;


class ModelingRouteServiceProvider extends ServiceProvider
{


    protected $namespace = 'Modeling\Applications\Http\Controllers';


    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

        $this->mapWebRoutes();
        $this->mapApiRoutes();
        $this->loadViewsFrom(__DIR__.'/../../Presentations/resources/views', 'modeling');


    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }


    /**
     * Define the "web" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::prefix('/')
            //->domain('api.vialoja.com.br')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('app/Modeling/Applications/routes/modeling.php'));
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('/api')
            //->domain('api.vialoja.com.br')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('app/Modeling/Applications/routes/api.php'));
    }
}