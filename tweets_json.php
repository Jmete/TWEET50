<?php
require 'tmhOAuth.php'; // Get it from: https://github.com/themattharris/tmhOAuth
// Above is a library used to access OAuth which is required by many api's in an easier way.

// Use the data from http://dev.twitter.com/apps to fill out this info
// notice the slight name difference in the last two items)

// This information should be kept secret and security can be an issue.

$connection = new tmhOAuth(array(
  'consumer_key' => '',
	'consumer_secret' => '',
	'user_token' => '', //access token
	'user_secret' => '' //access token secret
));

// Sets up parameters to pass. These can be found in the twitter api documentation.
$parameters = array();

// Count parameter
if ($_GET['count']) {
	$parameters['count'] = strip_tags($_GET['count']);
}
// Screen name parameter. This is effectively usernames.
if ($_GET['screen_name']) {
	$parameters['screen_name'] = strip_tags($_GET['screen_name']);
}
// Twitter path parameter
if ($_GET['twitter_path']) { $twitter_path = $_GET['twitter_path']; }  else {
	$twitter_path = '1.1/statuses/user_timeline.json';
}

$http_code = $connection->request('GET', $connection->url($twitter_path), $parameters );

if ($http_code === 200) { // if successful
	$response = strip_tags($connection->response['response']);

	if ($_GET['callback']) { // gets a response if we call for a jsonp callback function
		echo $_GET['callback'],'(', $response,');';
	} else {
		echo $response;
	}
} else {
	echo "Error ID: ",$http_code, "<br>\n"; // Error debugging
	echo "Error: ",$connection->response['error'], "<br>\n";
}

// You may have to download and copy http://curl.haxx.se/ca/cacert.pem authentication certificate.
// Might also require sudo curl if trying to recreate this on another server.
