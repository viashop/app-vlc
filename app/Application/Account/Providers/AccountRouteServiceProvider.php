<?php

namespace Vialoja\Application\Account\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class AccountRouteServiceProvider extends ServiceProvider
{


    protected $namespace = 'Vialoja\Application\Account\Http\Controllers';


    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->mapAccountRoutes();
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
     * Define the "Account" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapAccountRoutes()
    {
        Route::prefix('use')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('app/Application/Account/routes/account.php'));
    }
}
