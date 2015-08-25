<?php
$dir_1 = ("/heateryMap/assets/common/");
if($_POST){
    $data_arr=geocode($_POST['address']);
    if($data_arr){
        $latitude=$data_arr[0];
        $longitude=$data_arr[1];
        $city=$data_arr[2];
        require ($_SERVER['DOCUMENT_ROOT'] . $dir_1 . 'mrk_nav.php');
        require_once($_SERVER['DOCUMENT_ROOT'].$dir_1.'mrk_conn.php');
        require_once($_SERVER['DOCUMENT_ROOT'].$dir_1.'mrk_insert.php');
        require($_SERVER['DOCUMENT_ROOT'].$dir_1.'mrk_main_js.php');
    }else{
        echo "No map found.";
    }
}function geocode($address){
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