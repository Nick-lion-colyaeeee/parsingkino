<html>
    <head>
        <title></title>
    </head>
    <body>
<?php
        require_once $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';

        session_start();
//        session_destroy();
//        $OAUTH2_CLIENT_ID = '640119846158-nehprvk7oi795b8akn4scj5n3a8t303m.apps.googleusercontent.com';
//        $OAUTH2_CLIENT_SECRET = 'WMCMq3KHb405Qb_LutSVfxUv';
//my dany
$OAUTH2_CLIENT_ID = '734497946228-1movq5tjcf3o049qvnq362d3b6785die.apps.googleusercontent.com';
$OAUTH2_CLIENT_SECRET = '4Ma3QnmTRPd73eJuXzdR1ErZ';
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
//        $channelId = 'channel==UCO1HHUrnG2LIPxP3vKOy-WQ';
//my youtube
        $channelId = 'channel==UCTjhp-qvTHg-eK6CdxzISCA';
        $end_date = '2017-01-16';
        $start_date = '2013-01-15';
        $metric = 'likes,views,dislikes,comments,subscribersGained';
	$metricOne = 'averageViewPercentage,averageViewDuration';
	$metricTwo = 'viewerPercentage';
	$metricThree = 'likes,views,dislikes,comments,subscribersGained';
        $optparams = array(
            'dimensions' => 'day',
            'sort' => 'day'
        );
	$optparamsOne = array(
            'dimensions' => 'country',
            'sort' => 'country'
        );
	$optparamsTwo = array(
            'dimensions' => 'ageGroup,gender',
            'sort' => 'ageGroup'
        );
	$optparamsThree = array(
            'dimensions' => 'video',
            'sort' => '-views',
	    'max-results' => '200'
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

                        $result = $youtubeAnalytics->reports->query($channelId,$start_date,$end_date,$metric,$optparams);
			$demographic = $youtubeAnalytics->reports->query($channelId,$start_date,$end_date,$metricOne,$optparamsOne);
			$social = $youtubeAnalytics->reports->query($channelId,$start_date,$end_date,$metricTwo,$optparamsTwo);
			$video = $youtubeAnalytics->reports->query($channelId,$start_date,$end_date,$metricThree,$optparamsThree);
			$results = $result->getRows();
                $result1=json_encode($result);			
                file_put_contents('Maindata.json', $result1);
			$demographics = $demographic->getRows();
                $demographics1=json_encode($demographics);
                file_put_contents('Countrydata.json', $demographics1);
			$socials = $social->getRows();
                $socials1=json_encode($socials);
                file_put_contents('Agedata.json', $socials1);
			$videos = $video->getRows();
                $videos1=json_encode($videos);
                file_put_contents('Videodata.json', $videos1);

                        echo 'Main data';
			foreach ($results as $res){
		// variable $res contains an array of data in which the first Element is the date on which the data is taken, the second the total number of likes on the channel, a third of the total number of views, a quarter of the total number of dislaykov, fifth total kollichesvo comments, six the total number of subscribers
                        var_dump($res);
			echo '<br>';
                    }
			echo 'Country data';
			foreach ($demographics as $dem){
		// variable $dem contains an array of data in which the first Element is the abbreviated name of the country, the second percentage of views, a third of the average viewing time in seconds
                        var_dump($dem);
			echo '<br>';
                    }
			echo 'Age data';
			foreach ($socials as $soc){
		// variable $soc contains an array of data in which the first Element is the Strength of how much and to what age, the second guy or girl, the third percentage views
                        var_dump($soc);
			echo '<br>';
                    }
			echo 'Video data';
			foreach ($videos as $vid){
		// variable $vid contains an array of data in which the first Element is a video ID, the second the number of likes, one third of the number of views, number of dislaykov the fourth, the fifth number of comments, number of subscribers six
                        var_dump($vid);
			echo '<br>';
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






















