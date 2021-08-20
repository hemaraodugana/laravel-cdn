<?php

namespace Hemarao\Laravelcdnv2\Contracts;

/**
 * Interface CdnInterface.
 *
 * @author   Hemarao Dugana <hemsbapu9644@gmail.com>
 */
interface CdnInterface
{
    public function push();

    public function emptyBucket();
}
