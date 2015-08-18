<?php require 'assets/common/mrk_header.php';?>
<?php require 'assets/common/mrk_nav.php';?>
<?php 
if($_POST){
$data_arr = geocode($_POST['address']);
if($data_arr){
$latitude = $data_arr[0];
$longitude = $data_arr[1];
$city = $data_arr[2];
?>
<?php require_once 'assets/common/mrk_conn.php';?>
<?php require_once 'assets/common/mrk_select.php';?>
<script>
function displayMap() {
var retro_style = new google.maps.StyledMapType(retroStyle, {  name:"Retro"  }  );
var apple_style = new google.maps.StyledMapType(appleStyle, {  name:"Apple"  }  );
var light_style = new google.maps.StyledMapType(lightStyle, {  name:"Dusk"  }  );
var old_style = new google.maps.StyledMapType(oldStyle, {  name:"Vintage"  }  );
var pale_style = new google.maps.StyledMapType(paleStyle, {  name:"Cloud"  }  );
var brown_style = new google.maps.StyledMapType(brownStyle, {  name:"Organic"  }  );
var myOptions = {
zoom: 14,
center: new google.maps.LatLng(<?php echo $latitude; ?>, <?php echo $longitude; ?>),
scrollwheel: false,
panControl: false,
zoomControl: true,
zoomControlOptions: {
position: google.maps.ControlPosition.RIGHT_BOTTOM,
style: google.maps.ZoomControlStyle.SMALL
},
mapTypeControl: true,
mapTypeControlOptions: {
position: google.maps.ControlPosition.RIGHT_TOP,
style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
mapTypeIds: ["Retro", "Apple", "Dusk", "Vintage","Cloud","Organic", google.maps.MapTypeId.ROADMAP, google.maps.MapTypeId.SATELLITE, google.maps.MapTypeId.TERRAIN]
}
};  
map = new google.maps.Map(document.getElementById("map-canvas"), myOptions);
map.mapTypes.set("Retro", retro_style);
map.mapTypes.set("Apple", apple_style);
map.mapTypes.set("Dusk", light_style);
map.mapTypes.set("Vintage", old_style);
map.mapTypes.set("Cloud", pale_style);
map.mapTypes.set("Organic", brown_style);
map.setMapTypeId("Vintage");    
<?php require_once 'assets/common/mrk_insert.php';?>
<?php require_once 'assets/common/mrk_add.php';?>
}
google.maps.event.addDomListener(window, 'load', displayMap);
</script>
<?php
}else{
echo "No map found.";
}
}
?>
<?php require 'assets/common/mrk_page.php';?>
<?php 
function geocode($address){
$address = urlencode($address);
$url = "http://maps.google.com/maps/api/geocode/json?sensor=false&address={$address}";
$resp_json = file_get_contents($url);
$resp = json_decode($resp_json, true);
if($resp['status']='OK'){
$lati = $resp['results'][0]['geometry']['location']['lat'];
$longi = $resp['results'][0]['geometry']['location']['lng'];
$city = $resp['results']['0']['address_components']['0']['long_name'];
if($lati && $longi && $city){
$data_arr = array();            
array_push(
$data_arr, $lati, $longi, $city);
return $data_arr;
}else{
return false;
}
}else{
return false;
}
} 
?>
<?php require 'assets/common/mrk_footer.php';?>