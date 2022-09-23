<?php

namespace App\Providers;

use App\Packages\Base\Domain\Model\Environment;
use App\Packages\JWT\Domain\Adapter\JWTAdapterInterface;
use App\Packages\JWT\Domain\Adapter\LcobucciHmacSha256JWTAdapter;
use App\Packages\Keycloak\Domain\Wrapper\KeycloakWrapper;
use App\Packages\Keycloak\Domain\Wrapper\KeycloakWrapperInterface;
use App\Packages\Keycloak\Domain\Wrapper\KeycloakWrapperMock;
use App\Packages\PDF\Domain\Wrapper\LaravelSnappyPDFWrapper;
use App\Packages\PDF\Domain\Wrapper\PDFWrapperInterface;
use App\Packages\NotificacaoService\Domain\Wrapper\NotificacaoServiceWrapper;
use App\Packages\NotificacaoService\Domain\Wrapper\NotificacaoWrapperInterface;
use App\Packages\PeopleService\Domain\Wrapper\PeopleServiceWrapper;
use App\Packages\PeopleService\Domain\Wrapper\PeopleServiceWrapperInterface;
use App\Packages\PeopleService\Domain\Wrapper\PeopleServiceWrapperMock;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
