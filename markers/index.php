<?php $pg_title = 'PHP Markers';?>

<?php require '../assets/common/header.php';?>
<!-- BEGIN CONTENT -->
<body style="background-color: #000"> 
<?php 
if($_POST){
    
    $data_arr = geocode($_POST['address']);
    
        if($data_arr){

            $latitude = $data_arr[0];
            $longitude = $data_arr[1];
            $city = $data_arr[2];

require 'assets/common/mrk_nav.php';
require 'assets/common/mrk_page.php';

/*$city is passed to ../assets/db/q_top10.php in file assets/common/mrk_select.php*/
require_once '../assets/db/conn.php'; //Connect            
            
require_once '../assets/db/insert_top10_mrk.php';//takes $latitude and $longitude and passes the valus into the FB API call.

require_once 'assets/common/mrk_select.php';//$latitude and $longitude are passed again into an SQL query to extract the top 10 results. mrk_select requires the query file and stores the data as variables. At this point we should have the top 10 results stored in PHP variables.

?>
    
<script>//Create the map
function displayMap() {
var retro_style = new google.maps.StyledMapType(retroStyle, {  name:"Retro"  }  );
var apple_style = new google.maps.StyledMapType(appleStyle, {  name:"Apple"  }  );
var light_style = new google.maps.StyledMapType(lightStyle, {  name:"Dusk"  }  );
var old_style = new google.maps.StyledMapType(oldStyle, {  name:"Vintage"  }  );
var pale_style = new google.maps.StyledMapType(paleStyle, {  name:"Cloud"  }  );
var brown_style = new google.maps.StyledMapType(brownStyle, {  name:"Organic"  }  );
var myOptions = {
zoom: 14,
center: new google.maps.LatLng(<?php echo $latitude; ?>, <?php echo $longitude;?>),//$latitude and $longitude used again to determine center point of map
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
           
//require_once '../assets/db/insert_top10_mrk.php';//calls FB API??Inserts results into db...seems a little late for that.
    
<?php require_once 'assets/common/mrk_add.php';?>//Now that we have a map we should be able to add some markers and infowindows so we echo the data in the PHP variables to JS variables for display on map as markers and infowindows
}
$("#get_heatery").click(function(){
$.ajax({
url: "https://graph.facebook.com/v2.4/search?&q=restaurant&type=place&center=<?php echo($latitude);?>,<?php echo($longitude);?>&distance=8000&fields=talking_about_count,location,name&offset=0&limit=250&access_token=1452021355091002|x-ZB0iKqWQmYqnJQ-wXoUjl-XtY",
cache: true,
dataType: "text",
success: function(data) {
var restaurantData = $.parseJSON(data);
var myData = [];
var markers = [];      
var gradientNew = ["rgba(0,255,255,0)",
        "rgba(25, 22, 218, 1)", "rgba(17, 191, 225, 1)", "rgba(16, 227, 217, 1)", "rgba(15, 229, 173, 1)", "rgba(14, 231, 128, 1)", "rgba(13, 233, 82, 1)", "rgba(12, 235, 34, 1)", "rgba(37, 237, 11, 1)", "rgba(85, 239, 10, 1)", "rgba(134, 241, 8, 1)", "rgba(185, 243, 7, 1)", "rgba(237, 245, 6, 1)", "rgba(247, 203, 5, 1)", "rgba(249, 152, 3, 1)", "rgba(251, 100, 2, 1)", "rgba(255, 127, 131, 1)", "rgba(253, 47, 1, 1)", "rgba(255, 0, 7, 1)"
    ];
for (var i = 0; i < restaurantData.data.length; i++) {
        var lat = restaurantData.data[i].location.latitude;
        var lng = restaurantData.data[i].location.longitude;
        var wgt = restaurantData.data[i].talking_about_count;
        //var name = restaurantData.data[i].name;
        //var address = restaurantData.data[i].location.street;
        var latLng = new google.maps.LatLng(lat, lng, wgt);
        myData.push(latLng);
        }
        heatmap = new google.maps.visualization.HeatmapLayer({
            data: myData,
            radius: 30,
            opacity: 0.3,
            gradient: gradientNew,
            map: map

                });
            }
        });
    });    
google.maps.event.addDomListener(window, 'load', displayMap);
    
</script>
<?php }else{ echo "No map found.";}} ?>

<?php 
function geocode($address){
$address = urlencode($address);
$url = "http://maps.google.com/maps/api/geocode/json?sensor=false&address={$address}";
$resp_json = file_get_contents($url);
$resp = json_decode($resp_json, true);
if($resp['status']='OK'){
$lati = $resp['results'][0]['geometry']['location']['lat'];
$longi = $resp['results'][0]['geometry']['location']['lng'];
$city = $resp['results'][0]['address_components'][0]['long_name'];
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
require '../assets/common/footer.php';
?>