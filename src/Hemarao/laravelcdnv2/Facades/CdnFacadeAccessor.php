<?php

namespace Hemarao\laravelcdn\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class CdnFacadeAccessor.
 *
 * @category Facade Accessor
 *
 * @author  Hemarao <hemsbapu9644@gmail.com>
 */
class CdnFacadeAccessor extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'CDN';
    }
}
