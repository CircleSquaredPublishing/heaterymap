<?php
/*
File Name: update_hs.php
Description: Creates and updates heatery score.
Author: Circle Squared Data Labs
Author URI: http://www.heatery.io
*/

$sql= "UPDATE `top10_markers` SET top10_markers.`fb_heatery_score`=(top10_markers.`fb_talking_about`/top10_markers.`fb_likes`);";

    if (!$conn -> query ($sql)) {
    
        echo "Error updating Heatery Score: (" . $conn -> errno . ")" . $conn -> error;
    
    } else {
        
        echo "Heatery Score has been updated successfully in top10_markers."; 
        
}
$conn->close();