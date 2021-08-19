<?php

namespace Hemarao\LaravelCdn\Validators\Contracts;

/**
 * Interface ProviderValidatorInterface.
 *
 * @author  Kiran Ajudiya <ajudiyabalam@gmail.com>
 */
interface ProviderValidatorInterface
{
    public function validate($configuration, $required);
}
