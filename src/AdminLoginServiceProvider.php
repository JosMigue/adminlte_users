<?php

namespace josmigue\AdminlteUsers;

use Illuminate\Support\ServiceProvider;

class AdminLoginServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes.php');
        $this->loadViewsFrom(__DIR__ . '/Views', 'adminlte_users');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        $this->publishes([
            __DIR__.'/config/loginoz.php' => config_path('loginoz.php')
        ], 'OzParrAdmin' );
        $this->publishes([
            __DIR__.'/Views/' => base_path('resources/views/vendor/adminlte_users')
        ], 'OzParrAdmin');
        include __DIR__.'/Models/Rol.php';

    }

    /**
     * Register the application services.
     *
     * @return void
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function register()
    {
        $this->app->make('josmigue\AdminlteUsers\Controllers\Auth\LoginController');
        $this->app->make('josmigue\AdminlteUsers\Controllers\Auth\RegisterController');

        $this->app->make('josmigue\AdminlteUsers\Controllers\UsersController');
        $this->app->make('josmigue\AdminlteUsers\Controllers\RolesController');
    }
}
