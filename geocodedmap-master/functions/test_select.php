<?php
$mrk_cnt = 0;
/*
$res = $conn->query("SELECT 
fb_name, 
fb_heatery_score, 
fb_talking_about, 
fb_likes, 
fb_date,
SQRT ( POW ( 69.1 * ( fb_lat - $latitude ), 2 ) + POW ( 69.1 * ( $longitude - fb_lng ) * COS ( fb_lat/ 57.3 ), 2 ) ) 
AS distance 
FROM top10_markers 
WHERE fb_date = CURDATE() 
HAVING distance < 3 
ORDER BY fb_talking_about DESC 
LIMIT 10;");
*/


$res = $conn->query("SELECT DISTINCT 
fb_name, 
fb_lat,
fb_lng,
fb_street, 
fb_heatery_score,
fb_talking_about,
fb_date
FROM top10_markers 
WHERE 
fb_date = CURDATE()
AND
fb_city = '$city'
ORDER BY fb_talking_about DESC 
LIMIT 10;");


while 
    
($obj = $res->fetch_object()) {
    
$fbname[$mrk_cnt] = $obj->fb_name;
    
$lat[$mrk_cnt] = $obj->fb_lat;
    
$lng[$mrk_cnt] = $obj->fb_lng;
    
$street[$mrk_cnt] = $obj->fb_street; 
    
$heateryScore[$mrk_cnt] = $obj->fb_heatery_score;
    
$date[$mrk_cnt] = $obj->fb_date; 
    
$mrk_cnt++;
    
}

?>
