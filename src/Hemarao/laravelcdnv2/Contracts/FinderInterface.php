<?php

namespace Hemarao\laravelCDNv2\Contracts;

/**
 * Interface FinderInterface.
 *
 * @author   Hemarao <hemsbapu9644@gmail.com>
 */
interface FinderInterface
{
    public function read(AssetInterface $paths);
}