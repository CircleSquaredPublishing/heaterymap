<?php
/*
This query is used on the geocoder page table. Distance is factored when determining results.
*/

$stmt = $conn->query("SELECT 
fb_name,  
FORMAT(fb_talking_about,0), 
FORMAT(fb_were_here,0),
FORMAT(fb_likes,0),
TRUNCATE((SQRT ( POW ( 69.1 * ( fb_lat - $latitude ), 2 ) + POW ( 69.1 * ( $longitude - fb_lng ) * COS ( fb_lat/ 57.3 ), 2 ) ) * 0.621371),2)
AS distance 
FROM top10_markers 
WHERE fb_date = CURDATE()
HAVING distance < 30
ORDER BY fb_talking_about DESC LIMIT 10");