<?php
/*
This query is used on the geocoder page table. Distance is factored when determining results.
*/

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
?>