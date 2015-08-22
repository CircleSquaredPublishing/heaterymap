<?php $pg_title = 'PHP Markers';?>
<?php require '../assets/common/header.php';?>
<style>
    #main {
    float: left;
    }

    #left {
    margin-top: 30px;
    min-width: 200px;
    }

    .panel-default>.panel-heading {
    color: #D5DED9;
    background-color: rgba(82,66,4,0.7);
    border-color: transparent;
    }

    .panel-default {
    background-color: transparent;
    border-color: transparent;
    }

    #info_head {
    color: #D5DED9;
    margin: 0px;
    background-color: rgba(82,66,4,0.7);
    border-color: transparent;
    width:300px;
    }

    .btn-group {
    padding:10px;
    text-align:center;
    margin-left:5%;
    margin-right:5%;
    }
    
    #mrk_controls {
    background-color: #B2D0DB;
    }
    
    .dropdown-menu{
     background-color:rgba(82,66,4,0.7);
    position: absolute;
    top: 100%;
    left: 0;
    z-index: 1000;
    float: left;
    min-width: 160px;
    padding: 5px 0;
    margin: 2px 0 0;
    font-size: 14px;
    text-align: center;
    list-style: none;
    background-clip: padding-box;
    border: 1px solid rgba(0,0,0,.15);
    border-radius: 4px;
    box-shadow: 0 6px 12px rgba(0,0,0,.175);
    }

    #info_panel{
    width:300px;
    }

    #info_card{
    }

    #iw-container {
        margin-bottom: 10px;
    }

    .iw-title{
        color: #524204;
        font-weight: 200;
        background-color: #B2D0DB;
        font-size: 13px;
        padding: 5px;
        margin-top:10px;
    }

    .iw-content{
    width:100%;
    font-size: 12px;
    line-height: 18px;
    padding-top: 10px;
    max-height: 200px;
    overflow-y: auto;
    overflow-x: hidden;
    }

    #inf_table{
    text-align: center;
    color: #524204;
    font-weight: 200;
    }

    tbody{
   background-color:#8C670E;
    }

    tr{

    }

    tr :nth-child(1){
    width:33.33333%;
    }
    
        tr :nth-child(2){
    width:33.33333%;
    }
    
        tr :nth-child(3){
    width:33.33333%;
    }

    th{
    background-color: #d1b166;
    text-align: center;
    color: #524204;
    }

    td{
width:100%;
text-align:center;
padding:5px;
color:#D5DED9;
    }

</style>
<!-- BEGIN CONTENT -->
<body style="background-color:#666;">

<!-- BEGIN NAVBAR -->
<?php require 'assets/common/mrk_nav.php';?> 

<?php 
if($_POST){$data_arr = geocode($_POST['address']);
    if($data_arr){
        $latitude = $data_arr[0];
        $longitude = $data_arr[1];
        $city = $data_arr[2];

require 'assets/common/mrk_page.php';
require_once '../assets/db/conn.php';           
require_once '../assets/db/insert_top10_mrk.php';
require_once 'assets/common/mrk_select.php';

?>
    
<script>
    
var map;
function displayMap() {
    
var retro_style = new google.maps.StyledMapType(retroStyle,{name:"Retro"});
var apple_style = new google.maps.StyledMapType(appleStyle,{name:"Apple"});
var light_style = new google.maps.StyledMapType(lightStyle,{name:"Dusk"});
var old_style = new google.maps.StyledMapType(oldStyle,{name:"Vintage"});
var pale_style = new google.maps.StyledMapType(paleStyle,{name:"Cloud"});
var brown_style = new google.maps.StyledMapType(brownStyle,{name:"Organic"});
var myOptions = {
    zoom: 14,
    center: new google.maps.LatLng(<?php echo $latitude; ?>, <?php echo $longitude;?>),
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
    
    <?php require_once 'assets/common/mrk_add.php'; ?>
    
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
$("#btn-on-off").click(function() {
    heatmap.setMap(heatmap.getMap() ? null : map);
    });
$("#btn-radius").click(function() {
    heatmap.set("radius", heatmap.get("radius") ? null : 60);
    });
$("#btn-opacity").click(function() {
    heatmap.set("opacity", heatmap.get("opacity") ? null : 0.3);
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