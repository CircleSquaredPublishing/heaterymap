<?php

/* 
File Name: geo_post.php 
Description: Connects to database then passes the user input into the Google geocoder. The values stored in the $latitude and $longitude variables are passed into the FB API call as location parameters. The call the the FB API takes place in the insert.php file.
Author: Circle Squared Data Labs 
Author URI: http://www.heatery.io 
*/ 


date_default_timezone_set('America/New_York');
$today = date('l, F jS');


if( $_POST ) {
    
    $data_arr = geocode($_POST['address']);
    
    if( $data_arr ) {
        
        $latitude = $data_arr[0];
        
        $longitude = $data_arr[1];
        
        $city = $data_arr[2];
        
        echo "<div class='col-md-12'>The Heatery Top Ten within 10 km of $city on this Beautiful $today.</div></div>";
        
        } else {
        
    }
}

function geocode($address) {
    
    $address = urlencode($address);
    
    $url = "http://maps.google.com/maps/api/geocode/json?sensor=false&address={$address}";
    
    $resp_json = file_get_contents($url);
    
    $resp = json_decode($resp_json, true);
    
    if ($resp['status']='OK') {  
        
        $lati = $resp['results'][0]['geometry']['location']['lat'];
        
        $longi = $resp['results'][0]['geometry']['location']['lng'];
        
        $city = $resp['results']['0']['address_components']['0']['long_name'];
        
    if($lati && $longi && $city){
        
            $data_arr = array();
        
            array_push($data_arr, $lati, $longi, $city);
        
            return $data_arr;
        
        } else {
        
            return false;
        
        }
        
    } else {
        
        return false;
        
    }
    
}