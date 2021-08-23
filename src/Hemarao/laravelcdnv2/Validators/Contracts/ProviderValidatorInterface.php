<?php

namespace Hemarao\Laravelcdn\Validators\Contracts;

/**
 * Interface ProviderValidatorInterface.
 *
 * @author  Hemarao <hemsbapu9644@gmail.com>
 */
interface ProviderValidatorInterface
{
    public function validate($configuration, $required);
}
