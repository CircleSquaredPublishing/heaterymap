<?php
/*
File Name: output_json.php
Description: Query and output for heatery locator.
Author: Circle Squared Data Labs
Author URI: http://www.heatery.io
*/
require_once '../../geocodedmap-master/functions/conn.php';
$results = $conn->query("SELECT 
id,
name,
lat,
lng,
address,
city,
state,
postal,
web,
talking_about,
were_here,
likes
FROM locations 
WHERE address != ' ' 
ORDER BY talking_about DESC 
LIMIT 10");
$locations = array();
 
foreach($results as $location){
    array_push($locations, $location);
}
 
$fh = fopen("locations.json", 'w')
    or die ("Failed to create file");

fwrite($fh, json_encode($locations)) or die ("Could not write to file");
fclose($fh);
//Output JSON
echo json_encode($locations);

$conn->close();
?>