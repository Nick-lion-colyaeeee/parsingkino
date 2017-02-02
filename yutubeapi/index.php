<html>
<head>
    <title></title>
</head>
<body>
<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';

session_start();

$OAUTH2_CLIENT_ID = '640119846158-nehprvk7oi795b8akn4scj5n3a8t303m.apps.googleusercontent.com';
$OAUTH2_CLIENT_SECRET = 'WMCMq3KHb405Qb_LutSVfxUv';

$client = new Google_Client();
$client->setClientId($OAUTH2_CLIENT_ID);
$client->setClientSecret($OAUTH2_CLIENT_SECRET);

/*
 * This OAuth 2.0 access scope allows for read access to the YouTube Analytics monetary reports for
 * authenticated user's account. Any request that retrieves earnings or ad performance metrics must
 * use this scope.
 */
$client->setScopes(array('https://www.googleapis.com/auth/yt-analytics-monetary.readonly','https://www.googleapis.com/auth/yt-analytics.readonly','https://www.googleapis.com/auth/youtube','https://www.googleapis.com/auth/youtube.readonly'));
$redirect = filter_var('http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'],
    FILTER_SANITIZE_URL);
$client->setRedirectUri($redirect);

// YouTube Reporting object used to make YouTube Reporting API requests.
//$youtube = new Google_Service_YouTube_Resource_Channels();
$youtubeAnalytics = new Google_Service_YouTubeAnalytics($client);
$channelId = 'channel==UCO1HHUrnG2LIPxP3vKOy-WQ';
$end_date = '2017-01-16';
$start_date = '2017-01-15';
$metric = 'likes';
$optparams = array(
    'dimensions' => '7DayTotals',
    'sort' => 'day'
);

// Check if an auth token exists for the required scopes
$tokenSessionKey = 'token-' . $client->prepareScopes();
if (isset($_GET['code'])) {
    if (strval($_SESSION['state']) !== strval($_GET['state'])) {
        die('The session state did not match.');
    }
    $client->authenticate($_GET['code']);
    $_SESSION[$tokenSessionKey] = $client->getAccessToken();
    header('Location: ' . $redirect);
}

if (isset($_SESSION[$tokenSessionKey])) {
    $client->setAccessToken($_SESSION[$tokenSessionKey]);
}

// Check to ensure that the access token was successfully acquired.
if ($client->getAccessToken()) {
    // This code executes if the user enters a name in the form
    // and submits the form. Otherwise, the page displays the form above.
    try {


        //$channelId = $youtube->listChannels('MINE');
        //var_dump($youtubeAnalytics);

        $result = $youtubeAnalytics->reports->query($channelId,$start_date,$end_date,$metric);
        var_dump($result);
        foreach ($result as $res){
            echo $res;
        }

    } catch (Google_Service_Exception $e) {
        $htmlBody = sprintf('<p>A service error occurred: <code>%s</code></p>',
            htmlspecialchars($e->getMessage()));
    } catch (Google_Exception $e) {
        $htmlBody = sprintf('<p>An client error occurred: <code>%s</code></p>',
            htmlspecialchars($e->getMessage()));
    }
    $_SESSION[$tokenSessionKey] = $client->getAccessToken();

} else {
    // If the user hasn't authorized the app, initiate the OAuth flow
    $state = mt_rand();
    $client->setState($state);
    $_SESSION['state'] = $state;

    $authUrl = $client->createAuthUrl();
    //$htmlBody = <<<END
    echo '<h3>Authorization Required</h3>';
    echo '<p>You need to <a href="'.$authUrl.'">authorize access</a> before proceeding.<p>';

}


?>
</body>
</html>






















