<?php
use OAuth\Common\Token;
use OAuth\OAuth2\Service\Clio;
use OAuth\Common\Storage\Session;
use OAuth\Common\Consumer\Credentials;
use OAuth\UserData\ExtractorFactory;

/**
 * Bootstrap the example
 */
require_once __DIR__ . '/bootstrap.php';

// Session storage
$storage = new Session();

// Setup the credentials for the requests

    $credentials = new Credentials(
        $servicesCredentials['clio']['key'],
        $servicesCredentials['clio']['secret'],
        $currentUri->getAbsoluteUri()
    );


// Instantiate the Clio service using the credentials, http client and storage mechanism for the token
/** @var $clioService Clio */
$clioService = $serviceFactory->createService('clio', $credentials, $storage, array());
if (!empty($_GET['code'])) {
    $token = $clioService->requestAccessToken($_GET['code']);
    // Send a request with it
    $result = json_decode($clioService->request('/api/v2/users/who_am_i'), true);
    // Show some of the resultant data using the extractor
     echo 'Your user id is: ' . $result['account']['owner']['id']  .
         '</br>and your name is ' . $result['account']['owner']['name'].
         '</br>and your emil is ' . $result['account']['owner']['email'];
} elseif (!empty($_GET['go']) && $_GET['go'] === 'go') {
    $url = $clioService->getAuthorizationUri();
    header('Location: ' . $url);
} else {
    $url = $currentUri->getRelativeUri() . '?go=go';
    echo "<a href='$url'>Login with Clio!</a>";
}


