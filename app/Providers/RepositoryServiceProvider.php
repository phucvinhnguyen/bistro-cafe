<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        $this->app->bind(\App\Repositories\Interfaces\EmployeeRepository::class, \App\Repositories\Eloquent\EmployeeRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Interfaces\RolesRepository::class, \App\Repositories\Eloquent\RolesRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\Interfaces\RoleEmployeeRepository::class, \App\Repositories\Eloquent\RoleEmployeeRepositoryEloquent::class);
        //:end-bindings:
    }
}
