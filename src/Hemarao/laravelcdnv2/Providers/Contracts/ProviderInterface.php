<?php

namespace Hemarao\Laravelcdn\Hemarao\laravelcdnv2\Providers\Contracts;

/**
 * Interface ProviderInterface.
 *
 * @author   Hemarao <hemsbapu9644@gmail.com>
 */
interface ProviderInterface
{
    public function init($configurations);

    public function upload($assets);

    public function emptyBucket();

    public function urlGenerator($path);

    public function getUrl();

    public function getCloudFront();

    public function getCloudFrontUrl();

    public function getBucket();

    public function setS3Client($s3_client);
}
