<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />



    <!-- Done by James Mete for CS50
    May 16, 2014

    Hello, World!
    This is TWEET50. -->


	<title>TWEET50</title>

    <!-- for better design especially on smaller devices and layout of the list data  -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile.structure-1.4.5.min.css" />
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
    <link rel="stylesheet" href="resources/css/cs50.css" />

    <!-- js and jquery code including the main function for sending requests and receiving data from twitter api -->
	<script src="resources/js/cs50.js"></script>



</head>
<body>

	<div id="tweets">

        <!-- Header. User can click header to reload page -->
    	<div id="cs50head" onclick="redirect50()">TWEET50</div>
        <!-- Text input to check username -->
        <input type="text" placeholder="Enter twitter username" id="tweetinput">

<script>
    // Inline scripts make it easier to separate the backend js with more design-focused script
    // Calls function to get tweets when the text input changes. Activates by 'enter' key or by clicking outside.
    // Design note: I could also call the function on an interval to constantly update but since the twitter api imposes a strict rate limit, it might break the webapp.
    $(document).ready(function(){
    $("input").change(function(){
        reloadtwit();
    });
    });


    // Calls function on textinput. Sometimes buggy when deleting characters but overall adds to a fluid experience. User types and automatically checks the text input for username.
    $("#tweetinput").keyup( function() {
        reloadtwit();
    });
</script>
        <!-- Where the actual tweets will be displayed as li elements -->
		<div data-role="content" id="tweetlist">
            Attempting to load twitter feed, please wait...
		</div>
        <!-- content -->

	</div>



<!-- Sets a default call to api to get cs50 tweets to display as default tweets when page loads -->

<script src="tweets_json.php?screen_name=cs50&callback=listTweets" type="text/javascript"></script>



<a href="https://jamesmete.com" >
<div style="text-align:center;padding-top:4px;padding-bottom:4px;">© James Mete</div>
</a>
</body>
</html>
