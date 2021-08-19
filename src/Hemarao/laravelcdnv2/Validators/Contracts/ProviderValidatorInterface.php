<?php

namespace Hemarao\laravelCDNv2\Validators\Contracts;

/**
 * Interface ProviderValidatorInterface.
 *
 * @author  Hemarao <hemsbapu9644@gmail.com>
 */
interface ProviderValidatorInterface
{
    public function validate($configuration, $required);
}
