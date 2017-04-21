<?php

namespace Account\Applications\Providers;

use Account\Domains\Models\Role\RoleRepository;
use Illuminate\Support\ServiceProvider;
use Account\Domains\Models\User\UserRepository;
use Account\Infrastructures\Domains\User\UserRepositoryEloquent;
use Account\Infrastructures\Domains\Role\RoleRepositoryEloquent;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserRepository::class, UserRepositoryEloquent::class);
        $this->app->bind(RoleRepository::class, RoleRepositoryEloquent::class);
    }
}
