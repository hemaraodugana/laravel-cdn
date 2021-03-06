<?php

namespace Hemarao\Laravelcdn\Hemarao\laravelcdnv2\Exceptions;

/**
 * @author Hemarao <hemsbapu9644@gmail.com>
 */
class CdnException extends \RuntimeException
{
}

class MissingConfigurationFileException extends CdnException
{
}

class MissingConfigurationException extends CdnException
{
}

class UnsupportedProviderException extends CdnException
{
}

class EmptyPathException extends CdnException
{
}
