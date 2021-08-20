<?php

namespace Hemarao\Laravelcdnv2;

use Hemarao\Laravelcdnv2\Laravelcdnv2\Contracts\AssetInterface;
use Hemarao\Laravelcdnv2\Laravelcdnv2\Contracts\CdnHelperInterface;
use Hemarao\Laravelcdnv2\Laravelcdnv2\Contracts\CdnInterface;
use Hemarao\Laravelcdnv2\Laravelcdnv2\Contracts\FinderInterface;
use Hemarao\Laravelcdnv2\Laravelcdnv2\Contracts\ProviderFactoryInterface;

/**
 * Class Cdn
 * Class Cdn is the manager and the main class of this package.
 *
 * @category Main Class
 *
 * @author  Hemarao Dugana <hemsbapu9644@gmail.com>
 */
class Cdn implements CdnInterface
{
    /**
     * An instance of the finder class.
     *
     * @var Contracts\
     */
    protected $finder;

    /**
     * The object that will hold the assets configurations
     * and the paths of the assets.
     *
     * @var Contracts\AssetInterface
     */
    protected $asset_holder;

    /**
     * @var ProviderFactoryInterface
     */
    protected $provider_factory;

    /**
     * @var CdnHelperInterface
     */
    protected $helper;

    /**
     * @param FinderInterface          $finder
     * @param AssetInterface           $asset_holder
     * @param ProviderFactoryInterface $provider_factory
     * @param CdnHelperInterface       $helper
     *
     * @internal param \Hemarao\Laravelcdnv2\Repository $configurations
     */
    public function __construct(
        FinderInterface $finder,
        AssetInterface $asset_holder,
        ProviderFactoryInterface $provider_factory,
        CdnHelperInterface $helper
    ) {
        $this->finder = $finder;
        $this->asset_holder = $asset_holder;
        $this->provider_factory = $provider_factory;
        $this->helper = $helper;
    }

    /**
     * Will be called from the Hemarao\Laravelcdnv2\PushCommand class on Fire().
     */
    public function push()
    {
        // return the configurations from the config file
        $configurations = $this->helper->getConfigurations();

        // Initialize an instance of the asset holder to read the configurations
        // then call the read(), to return all the allowed assets as a collection of files objects
        $assets = $this->finder->read($this->asset_holder->init($configurations));

        // store the returned assets in the instance of the asset holder as collection of paths
        $this->asset_holder->setAssets($assets);

        // return an instance of the corresponding Provider concrete according to the configuration
        $provider = $this->provider_factory->create($configurations);

        return $provider->upload($this->asset_holder->getAssets());
    }

    /**
     * Will be called from the Hemarao\Laravelcdnv2\EmptyCommand class on Fire().
     */
    public function emptyBucket()
    {
        // return the configurations from the config file
        $configurations = $this->helper->getConfigurations();

        // return an instance of the corresponding Provider concrete according to the configuration
        $provider = $this->provider_factory->create($configurations);

        return $provider->emptyBucket();
    }
}
