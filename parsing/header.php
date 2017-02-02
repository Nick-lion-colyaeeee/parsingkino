

<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/vendor/atofighi/phpquery/phpQuery/phpQuery.php';
header('Content-Type: text/html; charset=utf-8');
//header('Content-Type: image/jpeg');
use GuzzleHttp\Client as Client;
use GuzzleHttp\Cookie\FileCookieJar;
    $name_cinima = "МОСТ-КИНО, Днепр";
    $jar = new \GuzzleHttp\Cookie\CookieJar;
    $cookieFile = $_SERVER['DOCUMENT_ROOT'] . '/cookies/heder.txt';
    $cookieJar2 = new FileCookieJar($cookieFile);
    $http_client = new Client(['base_uri' => 'http://misto.news/', 'cookies' => $cookieJar2]);
    $response = $http_client->request('GET', 'http://misto.news/stranitsa-v-razrabotke');
 $body2= $response->getBody(true);
$d = phpQuery::newDocumentHTML($body2);
echo $hedear= $d->find("div[id=header-wrapper]");
//header-wrapper
//$footer;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

</body>
</html>