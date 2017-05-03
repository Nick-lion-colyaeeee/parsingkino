<?php
/**
 * Created by PhpStorm.
 * User: colya
 * Date: 03.12.2016
 * Time: 19:18
 */
require_once __DIR__.'/vendor/autoload.php';
use GuzzleHttp\Client as Client;
$http_client= new Client(['base_uri'=>'https://google.com/']);
$response = $http_client->request('GET');
echo $response->getBody();