<?php

namespace Tesmachino\Cashfree;

use Illuminate\Support\ServiceProvider;

class CashfreeServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */

    public function boot()
    {
        //Routes Files
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');

        //View Files
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'cashfree');

        //Migration Files
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');

        //Config file 
        $this->mergeConfigFrom(
            __DIR__ . '/config/cashfree.php',
            'cashfree'
        );

        //Assets publish
        $this->publishes([
            __DIR__ . '/asset' => public_path('tesmachino/cashfree'),
        ], 'cashfree');

        //Cash free config publish - php artisan vendor:publish --tag=config --force 
        $this->publishes([
            __DIR__ . '/config/cashfree.php' => config_path('cashfree.php')
        ], 'config');

        //Cash free migrations publish - php artisan vendor:publish --tag=migrations --force 
        $this->publishes([
            __DIR__ . '/database/migrations' => database_path('migrations')
        ], 'migrations');
    }

    public function register()
    { }
}
