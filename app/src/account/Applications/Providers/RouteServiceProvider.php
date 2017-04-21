<?php

namespace Account\Applications\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;


class RouteServiceProvider extends ServiceProvider
{


    protected $namespace = 'Account\Applications\Http\Controllers';


    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

        $this->mapEmailRoutes();
        $this->mapInvitationRoutes();
        $this->mapLockRoutes();    
        $this->mapLoginRoutes();
        $this->mapRecoverRoutes();
        $this->mapRegisterRoutes();
        $this->mapResetRoutes();
        
        $this->loadViewsFrom(__DIR__.'/../../Presentations/resources/views', 'account');


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
     * Define the "email" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapEmailRoutes()
    {

        Route::prefix('/email-confirmar')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('app/src/account/Applications/routes/email.php'));

    }

    /**
     * Define the "invitation" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapInvitationRoutes()
    {

        Route::prefix('/convite')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('app/src/account/Applications/routes/invitation.php'));

    }

    /**
     * Define the "lock" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapLockRoutes()
    {

        Route::prefix('/bloqueado')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('app/src/account/Applications/routes/lock.php'));

    }   

    /**
     * Define the "login" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapLoginRoutes()
    {

        Route::prefix('/login')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('app/src/account/Applications/routes/login.php'));

    }

    /**
     * Define the "recover" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapRecoverRoutes()
    {

        Route::prefix('/recuperar-senha')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('app/src/account/Applications/routes/recover.php'));

    }

    /**
     * Define the "register" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapRegisterRoutes()
    {

        Route::prefix('/registrar')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('app/src/account/Applications/routes/register.php'));

    }

    /**
     * Define the "reset" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapResetRoutes()
    {

        Route::prefix('/senha-redefinir')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('app/src/account/Applications/routes/reset.php'));

    }

}
