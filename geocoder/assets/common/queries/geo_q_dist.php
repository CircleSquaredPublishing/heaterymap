<?php
/*
This query is used on the geocoder page table. Distance is factored when determining results.
*/
$stmt = $conn->prepare("SELECT 
fb_name,  
(fb_talking_about/fb_likes) AS fb_weight, 
fb_talking_about,
fb_were_here,
fb_date,
SQRT ( POW ( 69.1 * ( fb_lat - $latitude ), 2 ) + POW ( 69.1 * ( $longitude - fb_lng ) * COS ( fb_lat/ 57.3 ), 2 ) ) 
AS distance 
FROM top10_markers 
WHERE fb_date = CURDATE() 
HAVING distance < 10 
ORDER BY fb_weight DESC 
LIMIT 10");
?>