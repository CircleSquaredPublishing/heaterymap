<?php
$sql  = "CALL set_heatery_score";
if ( !$conn -> query ($sql) ) {
    
    echo "Error updating Heatery Score: ( " . $conn -> errno . " ) " . $conn -> error;
    
} else {

}
?>