<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/vendor/atofighi/phpquery/phpQuery/phpQuery.php';
header('Content-Type: text/html; charset=utf-8');
use GuzzleHttp\Client as Client;
//use GuzzleHttp\Cookie\FileCookieJar;
$http_client = new Client();
$response = $http_client->request('GET', 'https://multiplex.ua');
 echo $body2 = $response->getBody(true);
 echo$response->getStatusCode();
?>