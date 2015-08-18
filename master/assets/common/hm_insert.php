<?php 

/* 
File Name: insert.php 
Description: Inserts Facebook Graph API data into social_data database. Used only for geocoding purposes. Data is sent to specific table that is not normalized. It is our thoughts that a non normalized table will be better for this specific application since the number of concurrent users could be many and will never be known. All other data wil be stored in normalized tables within the social_data database. These tables will be utilized for features that are unlkiely to see the high volume demand and expedited turnaround time. Of course all is subject to change once in production. 
Author: Circle Squared Data Labs 
Author URI: http://www.heatery.io 
*/ 


$table = basename(__FILE__, '.php');
$name = ('assets/common/' . $table . '.json');
$fp = fopen( $name, 'w' );
$curl=curl_init('https://graph.facebook.com/v2.4/search?q=restaurant&type=place&distance=5000&center='. $latitude . ',' . $longitude . '&fields=location,name,likes,talking_about_count,were_here_count&limit=250&access_token=1452021355091002|x-ZB0iKqWQmYqnJQ-wXoUjl-XtY');
curl_setopt($curl, CURLOPT_URL);
curl_setopt($curl, CURLOPT_FILE, $fp);
curl_exec($curl);
curl_close($curl);
$results=file_get_contents($name);
$fb_array=json_decode($results, true);
foreach ($fb_array[data] as $i) {
json_decode($i, true);
echo PHP_EOL;
//BEGIN QUERY10 
$stmt10=$conn->prepare( "INSERT INTO `top10_markers`(`FID`, `fb_name`, `fb_likes`, `fb_were_here`, `fb_talking_about`, `fb_street`, `fb_city`, `fb_state`, `fb_zip`, `fb_lat`, `fb_lng`)VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)" );
$stmt10-> bind_param("dsiiisssidd", $FID, $fb_name, $fb_likes, $fb_were_here, $fb_talking_about, $fb_street, $fb_city, $fb_state, $fb_zip, $fb_lat, $fb_lng);
$FID=mysqli_real_escape_string($conn, $i['id']);
$fb_name=mysqli_real_escape_string($conn, $i['name']);
$fb_likes=mysqli_real_escape_string($conn, $i['likes']);
$fb_were_here=mysqli_real_escape_string($conn, $i['were_here_count']);
$fb_talking_about=mysqli_real_escape_string($conn, $i['talking_about_count']);
$fb_street=mysqli_real_escape_string($conn, $i['location']['street']);
$fb_city=mysqli_real_escape_string($conn, $i['location']['city']);
$fb_state=mysqli_real_escape_string($conn, $i['location']['state']);
$fb_zip=mysqli_real_escape_string($conn, $i['location']['zip']);
$fb_lat=mysqli_real_escape_string($conn, $i['location']['latitude']);
$fb_lng=mysqli_real_escape_string($conn, $i['location']['longitude']);
$stmt10->execute();
}
$stmt10->close();
?>