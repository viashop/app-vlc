<?php

namespace Vialoja\Application\Panel\Support\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class SupportRouteServiceProvider extends ServiceProvider
{


    protected $namespace = 'Vialoja\Application\Panel\Support\Http\Controllers';


    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->mapSupportRoutes();
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
     * Define the "support" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapSupportRoutes()
    {
        Route::prefix('su')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('app/Application/Panel/Support/routes/support.php'));
    }
}
