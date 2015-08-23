<?php 
/* 
File Name: insert.php 
Description: Inserts Facebook Graph API data into social_data database. Used only for geocoding purposes. Data is sent to specific table that is not normalized. It is our thoughts that a non normalized table will be better for this specific application since the number of concurrent users could be many and will never be known. All other data wil be stored in normalized tables within the social_data database. These tables will be utilized for features that are unlkiely to see the high volume demand and expedited turnaround time. Of course all is subject to change once in production. 
Author: Circle Squared Data Labs 
Author URI: http://www.heatery.io 
*/ 


$table = basename(__FILE__, '.php');
$name = ('assets/common/data/' . $table . '.json');
$fp = fopen( $name, 'w' );//Create the file to store the response. Make it writeable.


$ch=curl_init();//Initialize the curl function.

curl_setopt($ch, CURLOPT_URL, 'https://graph.facebook.com/v2.4/search?q=restaurant&type=place&distance=8000&center='. $latitude . ',' . $longitude . '&fields=location,name,likes,talking_about_count,were_here_count,description,website&limit=250&access_token=1452021355091002|x-ZB0iKqWQmYqnJQ-wXoUjl-XtY');//Request data from here


curl_setopt($ch, CURLOPT_FILE, $fp);//Write to this file. Defined above.

curl_exec($ch);//Execute the command.

curl_close($ch);//Close the command and clear memory.

$results=file_get_contents($name);//Get the contents of the cURL command.

$fb_array=json_decode($results, true);//Decode the JSON string.

foreach ($fb_array[data] as $i) {//Start of the loop that will decode nested values and insert all values into database.
json_decode($i, true);//Decode the nested values too.
echo PHP_EOL;//Add newlines to make it readable.

//Insert the data held in the variables into the db
$stmt1=$conn->prepare("INSERT INTO top10_markers(FID, fb_web,fb_description,fb_name, fb_likes, fb_were_here, fb_talking_about, fb_street, fb_city, fb_state, fb_zip, fb_lat, fb_lng)VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt1-> bind_param("dsssiiisssidd", $FID, $fb_web, $fb_description, $fb_name, $fb_likes, $fb_were_here, $fb_talking_about, $fb_street, $fb_city, $fb_state, $fb_zip, $fb_lat, $fb_lng);
$FID=mysqli_real_escape_string($conn, $i['id']);
$fb_web=mysqli_real_escape_string($conn, $i['website']);
$fb_description=mysqli_real_escape_string($conn, $i['description']);
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
$stmt1->execute();
}
$stmt1->close();
?>