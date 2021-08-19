<?php

namespace Hemarao\LaravelCdn\Contracts;

/**
 * Interface FinderInterface.
 *
 * @author   Kiran Ajudiya <ajudiyabalam@gmail.com>
 */
interface FinderInterface
{
    public function read(AssetInterface $paths);
}
