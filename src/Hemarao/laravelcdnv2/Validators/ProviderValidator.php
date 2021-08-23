<?php

namespace Hemarao\Laravelcdn\Hemarao\laravelcdnv2\Validators;

use Hemarao\laravelcdnv2\Exceptions\MissingConfigurationException;
use Hemarao\laravelcdnv2\Validators\Contracts\ProviderValidatorInterface;

/**
 * Class ProviderValidator.
 *
 * @category
 *
 * @author  Hemarao <hemsbapu9644@gmail.com>
 */
class ProviderValidator extends Validator implements ProviderValidatorInterface
{
    /**
     * Checks for any required configuration is missed.
     *
     * @param $configuration
     * @param $required
     *
     * @throws MissingConfigurationException
     */
    public function validate($configuration, $required)
    {
        // search for any null or empty field to throw an exception
        $missing = '';
        foreach ($configuration as $key => $value) {
            if (in_array($key, $required, true) &&
                (empty($value) || $value === null || $value === '')
            ) {
                $missing .= ' '.$key;
            }
        }

        if ($missing) {
            throw new MissingConfigurationException('Missed Configuration:'.$missing);
        }
    }
}
