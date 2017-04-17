<?php

namespace Vialoja\Modeling\Applications\Providers;

use Illuminate\Support\ServiceProvider;
use Vialoja\Modeling\Domains\Models\User\UserRepository;
use Vialoja\Modeling\Infrastructures\Domains\User\UserRepositoryEloquent;

class ModelingRepositoryServiceProvider extends ServiceProvider
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
