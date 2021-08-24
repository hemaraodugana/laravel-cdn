# laravelCDN

Content Delivery Network (CDN) Package for Laravel for Composer Version 2

NOTE:- GUZZLEHTTP/GUZZLE PACKAGE SHOULD BE 6.3 OR HIGHER AND IF IT SHOWS ERROR ON INSTALLING THE PACKAGE THEN REMOVE GUZZLEHTTP/GUZZLE FROM COMPOSER.JSON FILE AND INSTALL/UPDATE COMPOSER THEN INSTALL THE HEMARAO/LARAVELCDN THEN INSTALL GUZZLEHTTP/GUZZLE IT WILL WORK   


Laravel8 CDN Assets Manager

##### Content Delivery Network Package for Laravel8

The package provides the developer the ability to upload their assets (or any public file) to a CDN with a single artisan command.
And then it allows them to switch between the local and the online version of the files.

###### Fork From [vipertecpro/laravelcdn6](https://github.com/vipertecpro/laravelcdn6)
This project has been forked from https://github.com/vipertecpro/laravelcdn6. All credit for the original work goes there.

#### Laravel 7/8 Support
- Laravel 7/8 is supported, as is package auto-discovery.

## Highlights

- Amazon Web Services (AWS) - S3
- DigitalOcean (DO) - Spaces
- Artisan command to upload content to CDN
- Simple Facade to access CDN assets

## Installation

#### Via Composer

Require `Hemarao/laravel-cdn` in your project:

```bash
composer require hemarao/laravelcdn
```

*If you are using Laravel 5.4 or below, you need to register the service provider:*

Laravel 5.4 and below: Add the service provider and facade to `config/app.php`:

```php
'providers' => array(
     //...
     Hemarao\Laravelcdn\Hemarao\laravelcdnv2\CdnServiceProvider::class,
),

```

```php
'aliases' => array(
     //...
     'CDN' => Hemarao\Laravelcdn\Hemarao\laravelcdnv2\Facades\CdnFacadeAccessor::class
),
```

*If you are using Laravel 5.5, there is no need to register the service provider as this package is automatically discovered.*

Publish the package config file:

```bash
php artisan vendor:publish --provider 'Hemarao\Laravelcdn\Hemarao\laravelcdnv2\CdnServiceProvider'
```

## Environment Configuration

This package can be configured by editing the config/app.php file.  Alternatively, you can set many of these options in as environment variables in your '.env' file.

## Security Related Issues

If you discover any security related issues, please email hemsbapu9644@gmail.com instead of using the issue tracker for faster response. You should open an issue at the same time.