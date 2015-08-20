<?php
/*
This query is used for selecting top 10 markers. Distance is not factored when determining results and the variable $city is used because we coulnd't use $latitude and $longitude for some reason...can't remember why. Would like to settle on one query for the top ten and would prefer it be the one used in query_distance.php.
*/
$stmt = $conn->query("SELECT DISTINCT 
fb_name, 
fb_lat,
fb_lng,
fb_street, 
fb_talking_about,
fb_date
FROM top10_markers 
WHERE 
fb_date = CURDATE()
AND
fb_city = '$city' 
ORDER BY fb_talking_about DESC 
LIMIT 10"); //Pass $city variable here. We were passing $city because at the time we didn't have a way to query based on $lat and $lng but now we do so maybe this is no longer necessary. [8-19-15];
?>