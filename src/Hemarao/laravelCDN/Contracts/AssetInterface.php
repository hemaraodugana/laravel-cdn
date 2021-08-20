<?php

namespace Hemarao\laravelCDN\Contracts;

/**
 * Interface AssetInterface.
 *
 * @author   Hemarao <hemsbapu9644@gmail.com>
 */
interface AssetInterface
{
    public function init($configurations);

    public function getIncludedDirectories();

    public function getIncludedExtensions();

    public function getIncludedPatterns();

    public function getExcludedDirectories();

    public function getExcludedFiles();

    public function getExcludedExtensions();

    public function getExcludedPatterns();

    public function getExcludeHidden();

    public function getAssets();

    public function setAssets($assets);
}
