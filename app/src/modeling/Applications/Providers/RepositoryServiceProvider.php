<?php

namespace Modeling\Applications\Providers;

use Illuminate\Support\ServiceProvider;
use Modeling\Domains\Models\User\UserRepository;
use Modeling\Infrastructures\Domains\User\UserRepositoryEloquent;

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
    }
}
