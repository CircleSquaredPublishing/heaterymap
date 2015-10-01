<?php
if(!$_POST){
?>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

<div class="modal-dialog" role="document">

<div class="modal-content">

<div id="myModalHeader" class="modal-header">

<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>

<h4 class="modal-title" id="myModalLabel"><img id="myModalHeaderImg" src="https://www.heatery.io/hm-media/hm-img/hm_logo_csq_lg.jpg"/><br>
Welcome to the Circle Squared Data Labs Heatery Map
</h4>
    
</div>

<div id="myModalBody" class="modal-body">

<p>
To get started, enter a city name in the "Your Hot Spot" search box and click "Find".&nbsp;&nbsp;All data is current as of&nbsp;<?php date_default_timezone_set('America/New_York'); echo date('l F jS Y h:i A');?>.
</p> 
</div>
</div>
</div>
</div>
<script>
window.onload = getLocation;
$('#myModal').modal('show');
var heatmap;
var geocoder;
var map;
function getLocation(){
	if (navigator.geolocation){
		navigator.geolocation.getCurrentPosition(geoSuccess, geoError,{
			maximumAge: 30000,
			timeout: 10000,
			enableHighAccuracy: true
		});
	}else{
		alert("Geolocation is not supported by your browser.");
	}
}
function geoSuccess(position){
	var lat = position.coords.latitude;
    var lng = position.coords.longitude;
	var loc = new google.maps.LatLng(lat, lng);
	displayMap(position.coords);
	var fb ="https://graph.facebook.com/v2.4/search?&q=restaurant&type=place&center=" +loc+"&distance=5000&fields=talking_about_count,location,name&offset=0&limit=5000&access_token=1452021355091002|x-ZB0iKqWQmYqnJQ-wXoUjl-XtY";
	fb = fb.replace(/[()]/g, "");
	$(document).ready(function (){
		$.ajax({
			url: fb,
			dataType: "text",
			cache: true,
			success: function (data){
				var restaurantData = $.parseJSON(data);
				var myData = [];
				var gradientNew = ["rgba(0,255,255,0)", "rgba(25, 22, 218, 1)",
					"rgba(17, 191, 225, 1)", "rgba(16, 227, 217, 1)",
					"rgba(15, 229, 173, 1)", "rgba(14, 231, 128, 1)",
					"rgba(13, 233, 82, 1)", "rgba(12, 235, 34, 1)",
					"rgba(37, 237, 11, 1)", "rgba(85, 239, 10, 1)",
					"rgba(134, 241, 8, 1)", "rgba(185, 243, 7, 1)",
					"rgba(237, 245, 6, 1)", "rgba(247, 203, 5, 1)",
					"rgba(249, 152, 3, 1)", "rgba(251, 100, 2, 1)",
					"rgba(255, 127, 131, 1)", "rgba(253, 47, 1, 1)",
					"rgba(255, 0, 7, 1)"
				];
				for (var i = 0; i < restaurantData.data.length; i++){
					var lat = restaurantData.data[i].location.latitude;
					var lng = restaurantData.data[i].location.longitude;
					var wgt = restaurantData.data[i].talking_about_count;
					var latLng = new google.maps.LatLng(lat, lng, wgt);
					myData.push(latLng);
				    }
				heatmap = new google.maps.visualization.HeatmapLayer({
					data: myData,
					radius: 15,
					opacity: 0.3,
					gradient: gradientNew,
					map: map
				    });
			     }
		  });
});
    
}
function geoError(error){
	var old_style = new google.maps.StyledMapType(oldStyle,{
		name: "Vintage"
	});
	geocoder = new google.maps.Geocoder();
	var errorPosition = new google.maps.LatLng(39.8282, -98.5795);
	var mapOptions = {
		zoom: 4,
		center: errorPosition,
		panControl: false,
		zoomControl: true,
		mapTypeControl: false,
		mapTypeControlOptions:
		{
			style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
			position: google.maps.ControlPosition.TOP_RIGHT,
			mapTypeIds: ["Vintage",google.maps.MapTypeId.ROADMAP, google.maps.MapTypeId.SATELLITE, google.maps
				.MapTypeId.TERRAIN
			]
		}
	};
	map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
	map.setMapTypeId("Vintage");
	switch (error.code)
	{
	case
	error.PERMISSION_DENIED:
		alert("The Heatery Map Requires Your Location for Accurate Results");
		break;
	case
	error.POSITION_UNAVAILABLE:
		alert("Location information is unavailable.")
		break;
	case
	error.TIMEOUT:
		alert("The request to get user location timed out.")
		break;
	case
	error.UNKNOWN_ERROR:
		alert("An unknown error occurred.")
		break;
	}
}  
function displayMap(coords){
	geocoder = new google.maps.Geocoder();
	var old_style = new google.maps.StyledMapType(oldStyle,{
		name: "Vintage"
	});
	var successPosition = new google.maps.LatLng(coords.latitude, coords.longitude);
	var mapOptions = {
		zoom: 12,
		center: successPosition,
		scrollwheel: true,
		panControl: false,
		zoomControl: true,
		mapTypeControl: false
	};
	map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
	map.mapTypes.set("Vintage", old_style);
	map.setMapTypeId("Vintage");
    }
google.maps.event.addDomListener(window, "load", displayMap);  
</script>
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
        $version = '20150915';
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