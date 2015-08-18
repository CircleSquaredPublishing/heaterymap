<?php
//require "/github/geocodedmap-master/functions/conn.php";

$table = basename(__FILE__, '.php');
$name = ($table . '.json');
$fp = fopen($name, 'w')
    or die ("Failed to create file");

$results = $conn->query("SELECT *
FROM locations 
WHERE address != ' ' 
ORDER BY talking_about DESC 
LIMIT 10");

$locations = array();

foreach($results as $location){
    
    array_push($locations, $location);
    
}

function stripslashes_deep($value) {
      
$value = is_array($value) ? array_map('stripslashes_deep', $value) : stripslashes($value);

    return $value;
    
}

$locations = stripslashes_deep($locations);

fwrite($fp, json_encode($locations)) or die ("Could not write to file");

fclose($fp);

print_r($locations);

$conn->close();
?>