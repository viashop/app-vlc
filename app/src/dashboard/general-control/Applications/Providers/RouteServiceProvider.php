<?php

namespace Control\Domains\Models\Permission;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;


class RouteServiceProvider extends ServiceProvider
{


    protected $namespace = 'Control\Applications\Http\Controllers';


    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

        $this->mapDashboardRoutes();
        $this->loadViewsFrom(__DIR__.'/../../Presentations/resources/views', 'control');


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
     * Define the "general-control" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapDashboardRoutes()
    {
        Route::prefix('/painel')
            //->domain('api.vialoja.com.br')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('app/src/general-control/Applications/routes/dashboard.php'));
    }


}