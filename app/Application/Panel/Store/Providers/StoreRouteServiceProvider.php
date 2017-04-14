<?php

namespace Vialoja\Application\Panel\Store\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class StoreRouteServiceProvider extends ServiceProvider
{


    protected $namespace = 'Vialoja\Application\Panel\Store\Http\Controllers';


    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->mapStoreRoutes();
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
     * Define the "Store" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapStoreRoutes()
    {
        Route::prefix('st')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('app/Application/Panel/Store/routes/store.php'));
    }
}
