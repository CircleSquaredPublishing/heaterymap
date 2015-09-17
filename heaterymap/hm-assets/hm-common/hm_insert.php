<?php 
/* 
File Name: insert.php 
Description: Inserts Facebook Graph API data into social_data database. Used only for geocoding purposes. Data is sent to specific table that is not normalized. It is our thoughts that a non normalized table will be better for this specific application since the number of concurrent users could be many and will never be known. All other data wil be stored in normalized tables within the social_data database. These tables will be utilized for features that are unlkiely to see the high volume demand and expedited turnaround time. Of course all is subject to change once in production. 
Author: Circle Squared Data Labs 
Author URI: http://www.heatery.io 
*/ 
$table = basename(__FILE__ , '.php');
$name = ($table . '.json');
$fp = fopen($name, 'w' );
$ch=curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://graph.facebook.com/v2.4/search?q=restaurant&type=place&distance=8000&center='. $latitude . ',' . $longitude . '&fields=location,name,likes,talking_about_count,were_here_count,description,website,cover,about,culinary_team&limit=250&access_token=1452021355091002|x-ZB0iKqWQmYqnJQ-wXoUjl-XtY');
curl_setopt($ch, CURLOPT_FILE, $fp);
curl_exec($ch);
curl_close($ch);
$results=file_get_contents($name);
$fb_array=json_decode($results, true);
foreach ($fb_array[data] as $i) {
require_once($common_path . 'hm_conn.php');      
$stmt1=$conn->prepare("INSERT INTO top10_markers(FID, fb_web,fb_cover,fb_about,fb_culinary_team,fb_description,fb_name, fb_likes, fb_were_here, fb_talking_about, fb_street, fb_city, fb_state, fb_zip, fb_lat, fb_lng)VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt1-> bind_param("dssssssiiisssidd", $FID, $fb_web, $fb_cover, $fb_about, $fb_culinary_team, $fb_description, $fb_name, $fb_likes, $fb_were_here, $fb_talking_about, $fb_street, $fb_city, $fb_state, $fb_zip, $fb_lat, $fb_lng);
$FID=mysqli_real_escape_string($conn, $i['id']);
$fb_web=mysqli_real_escape_string($conn, $i['website']);
$fb_cover=mysqli_real_escape_string($conn, $i['cover']['source']);
$fb_about=mysqli_real_escape_string($conn, $i['about']);
$fb_culinary_team=mysqli_real_escape_string($conn, $i['culinary_team']);
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

$table_fs=basename(__FILE__,'.php');
$name_fs=($table_fs .'foursquare'.'.json');
$fp_fs=fopen($name_fs,'w');
$fs_url="https://api.foursquare.com/v2/venues/search?ll=" . $latitude . "," . $longitude . "&limit=50&radius=2000&categoryId=4d4b7105d754a06374d81259&client_id=$client_id&client_secret=$client_secret&v=$version";
$ch_fs=curl_init();
curl_setopt($ch_fs,CURLOPT_URL,$fs_url);
curl_setopt($ch_fs,CURLOPT_FILE,$fp_fs);
curl_exec($ch_fs);
curl_close($ch_fs);
$results_fs=file_get_contents($name_fs);
$response_fs=json_decode($results_fs,true);

foreach($response_fs[response][venues] as $fs){
    
    $stmt_fs= $conn->prepare(
        "INSERT INTO foursquare(
        FSID, 
        fs_name, 
        fs_phone,  
        fs_reservations,
        fs_menu, 
        fs_mobile_menu, 
        fs_tips, 
        fs_checkins, 
        fs_users, 
        fs_city, 
        fs_lat, 
        fs_lng)
        VALUES
        (?,?,?,?,?,?,?,?,?,?,?,?)"); 
    
    $stmt_fs->bind_param("ssssssiiisdd", 
                       $FSID,
                       $fs_name,
                       $fs_phone, 
                       $fs_reservations,
                       $fs_menu, 
                       $fs_mobile_menu, 
                       $fs_tips, 
                       $fs_checkins, 
                       $fs_users, 
                       $fs_city, 
                       $fs_lat, 
                       $fs_lng);
    
    $FSID = mysqli_real_escape_string($conn, $fs['id']); 
    $fs_name = mysqli_real_escape_string($conn, $fs['name']);
    $fs_phone= mysqli_real_escape_string($conn, $fs['contact']['formattedPhone']);
    $fs_reservations= mysqli_real_escape_string($conn, $fs['reservations']['url']); 
    $fs_menu= mysqli_real_escape_string($conn, $fs['menu']['url']);    
    $fs_mobile_menu= mysqli_real_escape_string($conn, $fs['menu']['mobileUrl']);   
    $fs_tips = mysqli_real_escape_string($conn, $fs['stats']['tipCount']);   
    $fs_checkins = mysqli_real_escape_string($conn, $fs['stats']['checkinsCount']);    
    $fs_users = mysqli_real_escape_string($conn, $fs['stats']['usersCount']); 
    $fs_city = mysqli_real_escape_string($conn, $fs['location']['city']); 
    $fs_lat = mysqli_real_escape_string($conn, $fs['location']['lat']);    
    $fs_lng = mysqli_real_escape_string($conn, $fs['location']['lng']);    
    $stmt_fs -> execute();
    } 
    
$stmt_fs->close();
?>