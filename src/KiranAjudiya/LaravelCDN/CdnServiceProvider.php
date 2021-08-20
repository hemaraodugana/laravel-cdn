<?php

namespace Hemarao\LaravelCdn;

use Illuminate\Support\ServiceProvider;
use KiranAjudiya\LaravelCDN\Contracts\CdnInterface;
use KiranAjudiya\LaravelCDN\Providers\Contracts\ProviderInterface;
use KiranAjudiya\LaravelCDN\Providers\AwsS3Provider;
use KiranAjudiya\LaravelCDN\Contracts\AssetInterface;
use KiranAjudiya\LaravelCDN\Contracts\FinderInterface;
use KiranAjudiya\LaravelCDN\Contracts\ProviderFactoryInterface;
use KiranAjudiya\LaravelCDN\Contracts\CdnFacadeInterface;
use KiranAjudiya\LaravelCDN\Contracts\CdnHelperInterface;
use KiranAjudiya\LaravelCDN\Validators\Contracts\ProviderValidatorInterface;
use KiranAjudiya\LaravelCDN\Validators\ProviderValidator;
use KiranAjudiya\LaravelCDN\Validators\Contracts\CdnFacadeValidatorInterface;
use KiranAjudiya\LaravelCDN\Validators\CdnFacadeValidator;
use KiranAjudiya\LaravelCDN\Validators\Contracts\ValidatorInterface;
use KiranAjudiya\LaravelCDN\Validators\Validator;
use KiranAjudiya\LaravelCDN\Commands\PushCommand;

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

        // facade bindings:
        //-----------------

        // Register 'CdnFacade' instance container to our CdnFacade object
        $this->app->singleton('CDN', static function ($app) {
            return $app->make(CdnFacade::class);
        });
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
