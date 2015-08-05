<?php

if ($_POST) {

        $data_arr = geocode ($_POST['address']);

if ($data_arr) {

        $latitude = $data_arr[0];

        $longitude = $data_arr[1];

        $city = $data_arr[2];     
    
    }
    
} else {
    
    echo "No map found.";
    
}

?>
