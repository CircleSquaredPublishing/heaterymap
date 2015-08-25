<?php
require_once('TwitterAPIExchange.php');

/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
    
    'oauth_access_token' => '3287690611-f4CwLN3vIqveiCVprNt9Mh7MOrDbWCOZNW0Ib4I',
    
    'oauth_access_token_secret' => 'MRQPlfg0axvZXGNYW5XVwqzPnoYKkJJpn56NckWVDp3f6',
    
    'consumer_key' => 'u33Iz9JkNLU53mSrCidCLcQOW',
    
    'consumer_secret' => 'U2LzIyRRWL6nvXdcgr19ox9BVJHJUNj1oKk6uh8TnJll5tvIaR',
    
);

$url = "https://api.twitter.com/1.1/statuses/user_timeline.json";


$requestMethod = "GET";

if ( isset($_GET['user'] ) ) {
    
    $user = $_GET['user'];
    
}else{
    
    $user = "@MaxsHarvest";
    
}

if ( isset($_GET['count'] ) ) {
    
    $count = $_GET['count'];
    
} else {
    
    $count = 10;

}

https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=@MaxsHarvest&count=10
$getfield = "?screen_name=$user&count=$count";

$twitter = new TwitterAPIExchange($settings);

$string = json_decode($twitter->setGetfield
                     ($getfield)->buildOauth
                     ($url, $requestMethod)->performRequest(), $assoc = TRUE);



if( $string["errors"][0]["message"] != "" ) {
    
    echo "<h3>Sorry, there was a problem.</h3>
    
    <p>Twitter returned the following error message:</p>
    
    <p><em> " . $string[errors][0]["message"]. " </em></p> ";
    
    exit();
    
}
foreach($string as $items) {
    
        echo 
            
            "Time and Date of Tweet: " . $items['created_at'] . "<br />";
    
        echo 
            
            "Tweet: " . $items['text'] . "<br />";
    
        echo 
            
            "Tweeted by: " . $items['user']['name'] . "<br />";
    
        echo 
            
            "Screen name: " . $items['user']['screen_name'] . "<br />";
    
        echo 
            
            "Followers: " . $items['user']['followers_count'] . "<br />";
    
        echo 
            
            "Friends: " . $items['user']['friends_count'] . "<br />";
    
        echo 
            
            "Listed: " . $items['user']['listed_count'] . "<br />";
    
    echo 
            
            "Favorites: " . $items['user']['favourites_count'] . "<br />";
    
    echo 
            
            "Statuses: " . $items['user']['statuses_count'] . "<br /><hr />";
    
    }

?>