<?php

namespace Wizard\Applications\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;


class RouteServiceProvider extends ServiceProvider
{

    protected $namespace = 'Wizard\Applications\Http\Controllers';


    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

        $this->mapWebRoutes();
        //$this->loadViewsFrom(__DIR__.'/../../Presentations/resources/views', 'desk');


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
        Route::prefix('/wizard')
            //->domain('api.vialoja.com.br')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('app/src/dashboard/wizard/Applications/routes/web.php'));
    }

}
