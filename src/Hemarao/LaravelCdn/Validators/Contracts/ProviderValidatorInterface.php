<?php

namespace src\Hemarao\LaravelCdn\Validators\Contracts;

/**
 * Interface ProviderValidatorInterface.
 *
 * @author  Hemarao Dugana <hemsbapu9644@gmail.com>
 */
interface ProviderValidatorInterface
{
    public function validate($configuration, $required);
}
