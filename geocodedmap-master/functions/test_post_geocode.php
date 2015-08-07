<?php

if( $_POST ) {
    
    $data_arr = geocode( $_POST['address'] ); 

        if( $data_arr ) {
    
            $latitude = $data_arr[0];
            $longitude = $data_arr[1];
    
             } else {
        }
    } 

function geocode($address){
 

    $address = urlencode($address);
     

    $url = "http://maps.google.com/maps/api/geocode/json?sensor=false&address={$address}";
 

    $resp_json = file_get_contents($url);
     

    $resp = json_decode($resp_json, true);
 

    if($resp['status']='OK'){
 
        // get the important data
        $lati = $resp['results'][0]['geometry']['location']['lat'];
        $longi = $resp['results'][0]['geometry']['location']['lng'];
    
         
 
        if($lati && $longi){
         
          
            $data_arr = array();            
             
            array_push(
                $data_arr, 
                    $lati, 
                    $longi
                );
             
            return $data_arr;
             
        }else{
            return false;
        }
         
    }else{
        return false;
    }
}
?>