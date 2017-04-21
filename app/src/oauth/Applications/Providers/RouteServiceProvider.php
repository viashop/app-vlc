<?php

namespace OAuth\Applications\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;


class RouteServiceProvider extends ServiceProvider
{


    protected $namespace = 'OAuth\Applications\Http\Controllers';


    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

        $this->mapOAuthAuthenticateRoutes();
        $this->mapOAuthRegisterRoutes();

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
     * Define the "oauth-authenticate" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapOAuthAuthenticateRoutes()
    {
        Route::prefix('/oauth/autenticar')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('app/src/oauth/Applications/routes/oauth-authenticate.php'));
    }


    /**
     * Define the "oauth-register" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapOAuthRegisterRoutes()
    {
        Route::prefix('/oauth/registrar')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('app/src/oauth/Applications/routes/oauth-register.php'));
    }

}