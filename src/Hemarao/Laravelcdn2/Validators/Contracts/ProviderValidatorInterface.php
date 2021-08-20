<?php

namespace Hemarao\Laravelcdnv2\Validators\Contracts;

/**
 * Interface ProviderValidatorInterface.
 *
 * @author  Hemarao Dugana <hemsbapu9644@gmail.com>
 */
interface ProviderValidatorInterface
{
    public function validate($configuration, $required);
}
