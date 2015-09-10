<?php
if(!$_POST){
?>
<h4>
    <div class="alert alert-success" role="alert">
        &nbsp;&nbsp;Enter city or address&nbsp;&nbsp;
        <span class="glyphicon glyphicon-chevron-up"></span>
        &nbsp;&nbsp;here to get started.
    </div>
</h4>

<?php
} else {
    
$data_arr=geocode($_POST['address']);
    
    if (!$limit=($_POST['limit'])){
        $limit=10;
    }
    
    if (!$distance=($_POST['distance'])){
        $distance=10;
    }
    
    if($data_arr){
        
        $latitude=number_format($data_arr[0], 2);
        $longitude=number_format($data_arr[1], 2);
        $city=$data_arr[2];
        /*@ begin foursquare param*/
        
        date_default_timezone_set("America/New_York");
        $today=date('l, F jS');
        $client_id = "LUDUFON05OQ3US4C0FT0TEKWXKSD0NHIPVGKF0TGUZGY4YUR";
        $client_secret ="F2E3NQTQKY3WS1APVGFVA31ESHW2ONNPVNJ11NPYVBV05W2I";
        $version = date('Ymd');
        /*@ end foursquare param*/
        
    }
}

function geocode($address){
    $address = urlencode($address);
    $url="https://maps.google.com/maps/api/geocode/json?sensor=false&address={$address}";
    $resp_json = file_get_contents($url);
    $resp = json_decode($resp_json, true);
    if($resp['status']='OK'){
        $lati=$resp['results'][0]['geometry']['location']['lat'];
        $longi = $resp['results'][0]['geometry']['location']['lng'];
        $city = $resp['results'][0]['address_components'][0]['long_name'];
        if($lati && $longi && $city){
            $data_arr = array();
            array_push($data_arr, $lati, $longi, $city);
            return $data_arr;
        }else{
            return false;
        }
    }else{
        return false;
    }
}
?>