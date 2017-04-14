<?php

namespace Vialoja\Application\Panel\Control\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class ControlRouteServiceProvider extends ServiceProvider
{


    protected $namespace = 'Vialoja\Application\Panel\Control\Http\Controllers';


    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->mapControlRoutes();
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
     * Define the "Control" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapControlRoutes()
    {
        Route::prefix('co')
            ->domain('painel.vialoja.com.br')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('app/Application/Panel/Control/routes/control.php'));
    }
}
