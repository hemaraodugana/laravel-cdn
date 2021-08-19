<?php

namespace src\Hemarao\LaravelCdn\Contracts;

/**
 * Interface FinderInterface.
 *
 * @author   Hemarao Dugana <hemsbapu9644@gmail.com>
 */
interface FinderInterface
{
    public function read(AssetInterface $paths);
}
