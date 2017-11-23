<?php

namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use App\Http\Action\Api\GetThisWeeksGameSoftwareRelease;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }
    
    public function register()
    {
        parent::register();
    
        /** @var Router $router */
        $router = $this->app['router'];
    
        /**
         * @SWG\Swagger(
         *     schemes={"http"},
         *     host="192.168.99.100",
         *     basePath="/api",
         *     @SWG\Info(
         *         version="1.0.0",
         *         title="LaravelSwaggerSample",
         *         description="LaravelでSwaggerを管理するサンプル",
         *         @SWG\Contact(
         *             email="kubotak@istyle.co.jp"
         *         ),
         *         @SWG\License(
         *             name="MIT License",
         *             url="https://opensource.org/licenses/MIT"
         *         )
         *     ),
         *     @SWG\ExternalDocumentation(
         *         description="Find out more about Swagger",
         *         url="http://swagger.io"
         *     )
         * )
         */
        $router->group(['prefix' => 'api'], function (Router $router) {
            $router->get('/game_software/release/week', ['uses' => GetThisWeeksGameSoftwareRelease::class]);
        });
    }
}
