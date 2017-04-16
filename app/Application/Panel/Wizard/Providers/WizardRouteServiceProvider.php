<?php

namespace Vialoja\Application\Panel\Wizard\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class WizardRouteServiceProvider extends ServiceProvider
{


    protected $namespace = 'Vialoja\Application\Panel\Wizard\Http\Controllers';


    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->mapWizardRoutes();
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
     * Define the "wizard" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapWizardRoutes()
    {
        Route::prefix('wiz')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('app/Application/Panel/Wizard/routes/wizard.php'));
    }
}
