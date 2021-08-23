<?php

namespace Hemarao\Laravelcdn;

use Illuminate\Support\ServiceProvider;
use Laravelcdn\Contracts\CdnInterface;
use Laravelcdn\Providers\Contracts\ProviderInterface;
use Laravelcdn\Providers\AwsS3Provider;
use Laravelcdn\Contracts\AssetInterface;
use Laravelcdn\Contracts\FinderInterface;
use Laravelcdn\Contracts\ProviderFactoryInterface;
use Laravelcdn\Contracts\CdnFacadeInterface;
use Laravelcdn\Contracts\CdnHelperInterface;
use Laravelcdn\Validators\Contracts\ProviderValidatorInterface;
use Laravelcdn\Validators\ProviderValidator;
use Laravelcdn\Validators\Contracts\CdnFacadeValidatorInterface;
use Laravelcdn\Validators\CdnFacadeValidator;
use Laravelcdn\Validators\Contracts\ValidatorInterface;
use Laravelcdn\Validators\Validator;
use Laravelcdn\Commands\PushCommand;

/**
 * Class CdnServiceProvider.
 *
 * @category Service Provider
 *
 * @author  Hemarao <hemsbapu9644@gmail.com>
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
