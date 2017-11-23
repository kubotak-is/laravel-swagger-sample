<?php
declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\DataAccess\Stub\GameSoftwareSource;
use App\Domain\Criteria\GameSoftwareCriteria;

/**
 * Class CriteriaServiceProvider
 * @package App\Providers
 */
class CriteriaServiceProvider extends ServiceProvider
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
        $this->app->bind(GameSoftwareCriteria::class, GameSoftwareSource::class);
    }
}
