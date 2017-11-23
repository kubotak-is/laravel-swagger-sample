<?php
declare(strict_types=1);

namespace App\Providers;

use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\AnnotationRegistry;
use Illuminate\Support\ServiceProvider;

/**
 * Class AnnotationRegisterServiceProvider
 * @package App\Providers
 */
class AnnotationRegisterServiceProvider extends ServiceProvider
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
        $loader = require base_path().'/vendor/autoload.php';
        AnnotationRegistry::registerLoader([$loader, 'loadClass']);
        AnnotationReader::addGlobalIgnoredNamespace('SWG');
    }
}
