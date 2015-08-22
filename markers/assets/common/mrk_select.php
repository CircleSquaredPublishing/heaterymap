<?php 

$mrk_cnt = 0;

//require '../assets/db/q_top10.php';

//require '../assets/db/q_dist.php';

$stmt = $conn->query("SELECT 
fb_web,
fb_description,
fb_name,  
fb_date,
fb_lat,
fb_lng,
fb_city,
fb_street,
fb_talking_about, 
fb_were_here,
fb_likes,
TRUNCATE((SQRT ( POW ( 69.1 * ( fb_lat - $latitude ), 2 ) + POW ( 69.1 * ( $longitude - fb_lng ) * COS ( fb_lat/ 57.3 ), 2 ) ) * 0.621371),2)
AS distance 
FROM top10_markers 
WHERE fb_date = CURDATE() HAVING distance < 1
ORDER BY fb_talking_about DESC LIMIT 10");

while    
    ($obj = $stmt->fetch_object()) {//get the data and store it in variables
    
    $fbname[$mrk_cnt] = $obj->fb_name;
    
    $lat[$mrk_cnt] = $obj->fb_lat;
    
    $lng[$mrk_cnt] = $obj->fb_lng;
    
    $street[$mrk_cnt] = $obj->fb_street;
    
    $talking_about[$mrk_cnt] = $obj->fb_talking_about;
    
    $likes[$mrk_cnt] = $obj->fb_likes;
    
    $were_here[$mrk_cnt] = $obj->fb_were_here;
    
    $date[$mrk_cnt] = $obj->fb_date;
    
    $fb_description[$mrk_cnt] = $obj->fb_description;
    
    $fb_web[$mrk_cnt] = $obj->fb_web;
    
    $mrk_cnt++;
}

$obj = null;
$conn = null;
?>