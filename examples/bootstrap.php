<?php

/**
 * Bootstrap the library
 */
require_once __DIR__ . '/../vendor/autoload.php';
//PHPoAuthUserData
/**
 * Setup error reporting
 */
error_reporting(E_ALL);
ini_set('display_errors', 1);

/**
 * Setup the timezone
 */
ini_set('date.timezone', 'Europe/Amsterdam');

/**
 * Create a new instance of the URI class with the current URI, stripping the query string
 */
$uriFactory = new \OAuth\Common\Http\Uri\UriFactory();
$currentUri = $uriFactory->createFromSuperGlobalArray($_SERVER);
$currentUri->setQuery('');

/**
 * @var array A list of all the credentials to be used by the different services in the examples
 */
$servicesCredentials = array(
    'facebook' => array(
        'key'       => '520369854752245',
        'secret'    => 'baa2f35e92a0a9ca34f0d76065ff5638'
    ),
    'clio' => array(
        'key'       => 'rNEKg6h54eXgNqUk24WASEup9UVv39AN0wF5AYMm',
        'secret'    => 'GXWavQ5vwN9Yl3HOEWisp4MlYfg9RdsxQmfJd4tE'
    )
);

/** @var $serviceFactory \OAuth\ServiceFactory An OAuth service factory. */
$serviceFactory = new \OAuth\ServiceFactory();
