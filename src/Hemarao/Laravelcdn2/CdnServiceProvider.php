<?php

namespace Hemarao\Laravelcdnv2;

use Illuminate\Support\ServiceProvider;
use Hemarao\Laravelcdnv2\Laravelcdnv2\Contracts\CdnInterface;
use Hemarao\Laravelcdnv2\Laravelcdnv2\Providers\Contracts\ProviderInterface;
use Hemarao\Laravelcdnv2\Laravelcdnv2\Providers\AwsS3Provider;
use Hemarao\Laravelcdnv2\Laravelcdnv2\Contracts\AssetInterface;
use Hemarao\Laravelcdnv2\Laravelcdnv2\Contracts\FinderInterface;
use Hemarao\Laravelcdnv2\Laravelcdnv2\Contracts\ProviderFactoryInterface;
use Hemarao\Laravelcdnv2\Laravelcdnv2\Contracts\CdnFacadeInterface;
use Hemarao\Laravelcdnv2\Laravelcdnv2\Contracts\CdnHelperInterface;
use Hemarao\Laravelcdnv2\Laravelcdnv2\Validators\Contracts\ProviderValidatorInterface;
use Hemarao\Laravelcdnv2\Laravelcdnv2\Validators\ProviderValidator;
use Hemarao\Laravelcdnv2\Laravelcdnv2\Validators\Contracts\CdnFacadeValidatorInterface;
use Hemarao\Laravelcdnv2\Laravelcdnv2\Validators\CdnFacadeValidator;
use Hemarao\Laravelcdnv2\Laravelcdnv2\Validators\Contracts\ValidatorInterface;
use Hemarao\Laravelcdnv2\Laravelcdnv2\Validators\Validator;
use Hemarao\Laravelcdnv2\Laravelcdnv2\Commands\PushCommand;
use Hemarao\Laravelcdnv2\Laravelcdnv2\Commands\EmptyCommand;

/**
 * Class CdnServiceProvider.
 *
 * @category Service Provider
 *
 * @author  Hemarao Dugana <hemsbapu9644@gmail.com>
 */
class CdnServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../../config/cdn.php' => config_path('cdn.php'),
        ]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {

        // implementation bindings:
        //-------------------------
        $this->app->bind(
            CdnInterface::class,
            Cdn::class
        );

        $this->app->bind(
            ProviderInterface::class,
            AwsS3Provider::class
        );

        $this->app->bind(
            AssetInterface::class,
            Asset::class
        );

        $this->app->bind(
            FinderInterface::class,
            Finder::class
        );

        $this->app->bind(
            ProviderFactoryInterface::class,
            ProviderFactory::class
        );

        $this->app->bind(
            CdnFacadeInterface::class,
            CdnFacade::class
        );

        $this->app->bind(
            CdnHelperInterface::class,
            CdnHelper::class
        );

        $this->app->bind(
            ProviderValidatorInterface::class,
            ProviderValidator::class
        );

        $this->app->bind(
            CdnFacadeValidatorInterface::class,
            CdnFacadeValidator::class
        );

        $this->app->bind(
            ValidatorInterface::class,
            Validator::class
        );

        // register the commands:
        //-----------------------
        $this->app->singleton('cdn.push', function ($app) {
            return $app->make(PushCommand::class);
        });

        $this->commands('cdn.push');

        $this->app->singleton('cdn.empty', function ($app) {
            return $app->make(EmptyCommand::class);
        });

        $this->commands('cdn.empty');

        // facade bindings:
        //-----------------

        // Register 'CdnFacade' instance container to our CdnFacade object
        $this->app->singleton('CDN', static function ($app) {
            return $app->make(CdnFacade::class);
        });

        // Shortcut so developers don't need to add an Alias in app/config/app.php
//        $this->app->booting(function () {
//            $loader = \Illuminate\Foundation\AliasLoader::getInstance();
//            $loader->alias('Cdn', 'Hemarao\Laravelcdnv2\Facades\CdnFacadeAccessor');
//        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
