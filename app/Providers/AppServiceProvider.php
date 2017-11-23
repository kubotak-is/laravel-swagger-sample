<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $env = $this->app->environment();
        if ($env === 'develop' || $env === 'local') {
            $this->app->register(\L5Swagger\L5SwaggerServiceProvider::class);
        }
    }
}
