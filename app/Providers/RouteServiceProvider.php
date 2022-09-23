<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/home';
    private const MAX_ATTEMPTS = 10000;

    protected $namespace = 'App\Http\Controllers';

    private array $webRouteFiles = [
        'web'
    ];

    private array $apiRouteFiles = [
        'api',
    ];

    public function boot()
    {
        parent::boot();
    }

    public function map()
    {
        $this->configureRateLimiting();
        $this->mapWebRoutes();
        $this->mapApiRoutes();
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(self::MAX_ATTEMPTS)->by($request->user()?->id ?: $request->ip());
        });
    }

    protected function mapWebRoutes()
    {
        foreach ($this->webRouteFiles as $filename) {
            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path("routes/$filename.php"));
        }
    }

    protected function mapApiRoutes()
    {
        foreach ($this->apiRouteFiles as $filename) {
            Route::prefix('api')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path("routes/$filename.php"));
        }
    }
}
