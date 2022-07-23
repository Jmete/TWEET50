
// Function heavily inspired by online twitter api tutorials. 
function listTweets(data) {
	console.log(data);
	var output = '<ul data-role="listview" data-theme="a">';
	
	$.each(data, function(key, val) {
		var text = data[key].text;
		var thumbnail = data[key].user.profile_image_url;
		var name = data[key].user.name;
		
		text=text.replace(/[A-Za-z]+:\/\/[A-Za-z0-9-_]+\.[A-Za-z0-9-_:%&~\?\/.=]+/g, function(i) {
			var url=i.link(i);
			return url;
		});
		
		text=text.replace(/[@]+[A-Za-z0-9-_]+/g, function(i) {
			var item = i.replace("@",'');
			var	url = i.link("https://twitter.com/"+ item);
			return url;
		});
		
		text=text.replace(/[#]+[A-Za-z0-9-_]+/g, function(i) {
			var item = i.replace("#", '%23');
			var url = i.link("https://search.twitter.com/search?q="+item);
			return url;
		});
		
		output += '<li>';
		output += '<img src="' + thumbnail +'" alt="Photo of ' + name + '">';
		output += '<div>' + text + '</div>';
		output += '</li>';		
	}); //go through each tweet
	output += '</ul>';
	$('#tweetlist').html(output);
}


// Reloads the function to get the tweets. It uses the text input to get the username.
function reloadtwit(){
    // Stores the text input in a variable
    var sftweet = document.getElementById("tweetinput").value;
    
    if (sftweet == ""){
        //Do nothing if textinput is empty. I could also set this to rever to CS50 timeline but that is a design debate.
    }else{
    // Attaches variable to full string needed to gather tweets from the twitter api.    
    var fullsftweet = "tweets_json.php?screen_name="+sftweet+"&count=50";
    //Gets the tweets
    $.getJSON(fullsftweet,function(data) {
    			listTweets(data);
				$('#tweetlist').trigger('create');
    
		});
        
}
}


function redirect50(){
    window.location.href = "https://tweet50.jamesmete.com";
}






