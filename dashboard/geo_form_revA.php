<!DOCTYPE html>
<html>
<head>
    <title>Database Search Template</title>
<meta charset= "UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!----------SCHEMA TAGS---------->
<meta name="description" content="See all the hottest restaurants in Delray Beach, FL as calculated by the heatery.io algorithm."/>
<meta name="keywords" content="Heatery, Delray Beach, Restaurants, Top 10, heatery.io, heatery map"/>
<meta name="author" content="Delray Beach Heatery Map"/>
    
<!----------SCHEMA.ORG MARKUP FOR GOOGLE+---------->
<meta itemprop="name" content="The Delray Beach Heatery Map">
<meta itemprop="description" content="Find the Hottest Restaurants in Delray Beach with the heatery.io Heatery Map!">
<meta itemprop="image" content="http://www.heatery.io/wp-content/uploads/2015/07/ICON-heatery-no-edge-1024x10243-e1435771319636.png">    
    
<!----------FACEBOOK OG:TAGS---------->
<meta property="og:site_name" content="heatery.io Heatery Map" />
<meta property="og:url" content="http://www.heatery.io/theDAC/"/>
<meta property="og:type" content="website"/>
<meta property="og:title" content="The Delray Beach Heatery Map"/>
<meta property="og:description" content="Find the Best Places to Be in Delray Beach Like Never Before!" />
<meta property="og:image" content="http://www.heatery.io/wp-content/uploads/2015/07/COMING-SOON-60p.png"/>
<meta property="fb:app_id" content="1452021355091002"/>
    
<!----------TWITTER CARD: TAGS---------->
<meta name="twitter:card" content="summary_large_image"/>
<meta name="twitter:site" content="@DelrayInfo"/>
<meta name="twitter:title" content="The Delray Beach Heatery Map"/>
<meta name="twitter:description" content="Find the Hottest Restaurants in Delray Beach with the heatery.io Heatery Map!">
<meta name="twitter:creator" content="@DelrayInfo"/>
<meta name="twitter:image:src" content="http://www.heatery.io/wp-content/uploads/2015/07/ICON-heatery-no-edge-1024x10243-e1435771319636.png"/>
    
<!----------EXTERNAL LIBRARIES---------->
<script>
    
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-64702784-1', 'auto');
  ga('send', 'pageview');

</script>
<!-- - - - - - - - - - - EXTERNAL ASSETS - - - - - - - - - - -->

<!-- JQUERY 2.1.4 -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

<!-- GOOGLE MAPS V3.EXP INCLUDES VISUALIZATION AND PLACES LIBRARIES  -->
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=false&libraries=visualization,places"></script>
 
<!-- GOOGLE MAPS MARKER CLUSTERER LIBRARY  -->    
<script src="https://google-maps-utility-library-v3.googlecode.com/svn/trunk/markerclustererplus/src/markerclusterer.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"/>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css"/>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<link rel="stylesheet" type="text/css" href="css/keen-dashboards.css" />
<script src="/github/assets/js/map_layers_min.js"></script>
</head>
<body class="application">
    
<script>
window.onload = getLocation;
   
function getLocation(){
	if (navigator.geolocation)
	{
		navigator.geolocation.getCurrentPosition(geoSuccess, geoError,
		{
			maximumAge: 30000,
			timeout: 10000,
			enableHighAccuracy: true
		});
	}
	else
	{
		alert("Geolocation is not supported by your browser.");
	}
}
function geoSuccess(position){
	var lat = position.coords.latitude;
    var lng = position.coords.longitude;
	var loc = new google.maps.LatLng(lat, lng);
	displayMap(position.coords);
	var fb =
		"https://graph.facebook.com/v2.4/search?&q=restaurant&type=place&center=" +
		loc +
		"&distance=5000&fields=talking_about_count,location,name&offset=0&limit=5000&access_token=1452021355091002|x-ZB0iKqWQmYqnJQ-wXoUjl-XtY";
	fb = fb.replace(/[()]/g, "");
	$(document).ready(function ()
	{
		$.ajax(
		{
			url: fb,
			dataType: "text",
			cache: true,
			success: function (data)
			{
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
				for (var i = 0; i < restaurantData.data.length; i++)
				{
					var lat = restaurantData.data[i].location.latitude;
					var lng = restaurantData.data[i].location.longitude;
					var wgt = restaurantData.data[i].talking_about_count;
					var latLng = new google.maps.LatLng(lat, lng, wgt);
					myData.push(latLng);
				}
				heatmap = new google.maps.visualization.HeatmapLayer(
				{
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
	var retro_style = new google.maps.StyledMapType(retroStyle,
	{
		name: "Retro"
	});
	var apple_style = new google.maps.StyledMapType(appleStyle,
	{
		name: "Apple"
	});
	var light_style = new google.maps.StyledMapType(lightStyle,
	{
		name: "Dusk"
	});
	var old_style = new google.maps.StyledMapType(oldStyle,
	{
		name: "Vintage"
	});
	var pale_style = new google.maps.StyledMapType(paleStyle,
	{
		name: "Cloud"
	});
	var brown_style = new google.maps.StyledMapType(brownStyle,
	{
		name: "Organic"
	});
	geocoder = new google.maps.Geocoder();
	var errorPosition = new google.maps.LatLng(39.8282, -98.5795);
	var mapOptions = {
		zoom: 4,
		center: errorPosition,
		panControl: false,
		zoomControl: true,
		mapTypeControl: true,
		mapTypeControlOptions:
		{
			style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
			position: google.maps.ControlPosition.TOP_RIGHT,
			mapTypeIds: ["Retro", "Apple", "Dusk", "Vintage", "Cloud", "Organic",
				google.maps.MapTypeId.ROADMAP, google.maps.MapTypeId.SATELLITE, google.maps
				.MapTypeId.TERRAIN
			]
		}
	};
	map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
	map.mapTypes.set("Retro", retro_style);
	map.mapTypes.set("Apple", apple_style);
	map.mapTypes.set("Dusk", light_style);
	map.mapTypes.set("Vintage", old_style);
	map.mapTypes.set("Cloud", pale_style);
	map.mapTypes.set("Organic", brown_style);
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
var heatmap;
var geocoder;
var map;
$(function (){
	$('[data-toggle="tooltip"]').tooltip()
});
function displayMap(coords){

	geocoder = new google.maps.Geocoder();

	var retro_style = new google.maps.StyledMapType(retroStyle,
	{
		name: "Retro"
	});
	var apple_style = new google.maps.StyledMapType(appleStyle,
	{
		name: "Apple"
	});
	var light_style = new google.maps.StyledMapType(lightStyle,
	{
		name: "Dusk"
	});
	var old_style = new google.maps.StyledMapType(oldStyle,
	{
		name: "Vintage"
	});
	var pale_style = new google.maps.StyledMapType(paleStyle,
	{
		name: "Cloud"
	});
	var brown_style = new google.maps.StyledMapType(brownStyle,
	{
		name: "Organic"
	});
    var mono_style = new google.maps.StyledMapType(monoStyle,{
        name: "Mono"
    });
	var successPosition = new google.maps.LatLng(coords.latitude, coords.longitude);

	var mapOptions = {
		zoom: 12,
		center: successPosition,
		scrollwheel: false,
		panControl: false,
		zoomControl: true,
		zoomControlOptions:
		{
			position: google.maps.ControlPosition.RIGHT_BOTTOM,
			style: google.maps.ZoomControlStyle.SMALL
		},
		mapTypeControl: true,
		mapTypeControlOptions:
		{
			position: google.maps.ControlPosition.RIGHT_TOP,
			style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
			mapTypeIds: ["Retro", "Apple", "Dusk", "Vintage", "Cloud", "Organic", "Mono",
				google.maps.MapTypeId.ROADMAP, google.maps.MapTypeId.SATELLITE, google.maps
				.MapTypeId.TERRAIN
			]
		}
	};

	map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);

	map.mapTypes.set("Retro", retro_style);
	map.mapTypes.set("Apple", apple_style);
	map.mapTypes.set("Dusk", light_style);
	map.mapTypes.set("Vintage", old_style);
	map.mapTypes.set("Cloud", pale_style);
	map.mapTypes.set("Organic", brown_style);
    map.mapTypes.set("Mono", mono_style);
	map.setMapTypeId("Vintage");

}
google.maps.event.addDomListener(window, "load", displayMap);    
</script>
    
    
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
<div class="container-fluid">
<div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="">
        <span><img id="geo_header_logo" src="/github/assets/media/favicon.ico/heatery/ms-icon-310x310.png" style="width:45px; height:45px;"/></span>
    </a>
    <a class="navbar-brand" href="#"></a>
</div>
<div class="navbar-collapse collapse">
    <ul class="nav navbar-nav navbar-left">
        <li><a href="https://heatery.io">Home</a></li>
        <li><a href="https://heatery.io/team">Team</a></li>
        <li><a href="#">Source</a></li>
        <li><a href="#">Community</a></li>
        <li><a href="#">Technical Support</a></li>
    </ul>
</div>
</div>
</div>
<div class="container-fluid">
<div id="row_main" class="row">
<div id="row1" class="row">   
<div id="chart1" class="col-xs-4">
<div class="chart-wrapper">
<div class="chart-title">
query.php
</div>
<div class="chart-stage">
    
    
<form role='form ' name='myForm' method='get'>
    <div class='form-group'>
        <div class="row">
            <div class="col-xs-3">
                <label for='likes'>Likes:
                    <a href="#" data-toggle1="tooltip1" title="Likes >= input">?</a>
                </label>
                <input type='text' class='form-control input-sm' id='likes' />
            </div>
            <div class="col-xs-4">
                <label for='tac'>Talking About:
                    <a href="#" data-toggle2="tooltip2" title="Talking About Count >= input">?</a>
                </label>
                <input type='text' class='form-control input-sm' id='tac' />
            </div>
            <div class="col-xs-5">
                <label for='datepicker'>Date:
                    <a href="#" data-toggle3="tooltip3" title="Request Data for the Selected Date.">?</a>
                </label>
                <input type='text' class='form-control input-sm' id='datepicker' size='30'>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-xs-6">
                 <div class="form-group">
                <lable for='format'>Date Format Options:
                    <a href="#" data-toggle4="tooltip4" title="MySQL requires ISO 8601 - yy-mm-dd">?</a>
                </lable>
                <select class='form-control input-sm' id='format' value='yy-mm-dd'>
                    <option value='mm/dd/yy'>Default - mm/dd/yy</option>
                    <option value='yy-mm-dd'>ISO 8601 - yy-mm-dd</option>
                </select>
                </div>
            </div>
            <div class='col-xs-6'>
                <div class="form-group">
                <label for='zip'>Zip Code:</label>
                <select class='form-control input-sm' id='zip'>
                    <option value='33483'>33483</option>
                    <option value='33444'>33444</option>
                    <option value='33445'>33445</option>
                    <option value='0'>0</option>
                </select>
                </div>
                <input type='button' class='btn btn-success btn-sm' onclick='ajaxFunction()' value='Get Data' />
            </div>
        </div>
    </div>
</form>

<div class='container'>
    <div class='row' id='ajaxDiv'>
        <div class='col-xs-12'></div>
    </div>
    <br>
</div>
</div>
<div class="chart-notes">
    Notes about this chart
</div>
</div>
<script>
    $(document).ready(function() {

        $('[data-toggle1="tooltip1"]').tooltip();

    });

    $(document).ready(function() {

        $('[data-toggle2="tooltip2"]').tooltip();

    });

    $(document).ready(function() {

        $('[data-toggle3="tooltip3"]').tooltip();

    });

    $(document).ready(function() {

        $('[data-toggle4="tooltip4"]').tooltip();

    });


    $(function() {

        $("#datepicker").datepicker();

        $("#format").change(function() {

            $("#datepicker").datepicker("option", "dateFormat", $(this).val());

        });

    });

    //Browser Support Code
    function ajaxFunction() {
        var ajaxRequest; // The variable that makes Ajax possible!
        try {

            // Opera 8.0+, Firefox, Safari
            ajaxRequest = new XMLHttpRequest();
        } catch (e) {

            // Internet Explorer Browsers
            try {
                ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e) {

                try {
                    ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
                } catch (e) {

                    // Something went wrong
                    alert("Your browser broke!");
                    return false;
                }
            }
        }

        // Create a function that will receive data
        // sent from the server and will update
        // div section in the same page.
        ajaxRequest.onreadystatechange = function() {

            if (ajaxRequest.readyState == 4) {
                var ajaxDisplay = document.getElementById('ajaxDiv');
                ajaxDisplay.innerHTML = ajaxRequest.responseText;
            }
        }

        // Now get the value from user and pass it to
        // server script.
        var likes = document.getElementById('likes').value;
        var tac = document.getElementById('tac').value;
        var zip = document.getElementById('zip').value;
        var datepicker = document.getElementById('datepicker').value;
        var queryString = "?likes=" + likes;

        queryString += "&tac=" + tac + "&zip=" + zip + "&datepicker=" + datepicker;
        ajaxRequest.open("GET", "query.php" + queryString, true);
        ajaxRequest.send(null);
    }
</script>
</div><!--@end chart1-->   
<div id="chart2" class="col-xs-4">
    <div class="chart-wrapper">
        <div class="chart-title">
            Current Location Heatery Map
        </div>
        <div id= "map-canvas" class="chart-stage">

        </div>
        <div class="chart-notes">
            Uses HTML5 Geolocation API
        </div>
    </div>
</div><!--@end chart2-->   
<div id="chart3" class="col-xs-4">
<div class="chart-wrapper">
<div class="chart-title">
query_right.php
</div>
<div class="chart-stage">
    
    

<form role='form ' name='myForm' method='get'>
    <div class='form-group'>
        <div class="row">
            <div class="col-xs-3">
                <label for='likes_right'>Likes:
                    <a href="#" data-toggle1="tooltip1" title="Likes >= input">?</a>
                </label>
                <input type='text' class='form-control input-sm' id='likes_right' />
            </div>
            <div class="col-xs-4">
                <label for='tac_right'>Talking About:
                    <a href="#" data-toggle2="tooltip2" title="Talking About Count >= input">?</a>
                </label>
                <input type='text' class='form-control input-sm' id='tac_right' />
            </div>
            <div class=col-xs-5>
                <label for='datepicker_right'>Date:
                    <a href="#" data-toggle3="tooltip3" title="MySQL requires ISO 8601 - yy-mm-dd">?</a>
                </label>
                <input type='text' class='form-control input-sm' id='datepicker_right' size='30' value='yy-mm-dd'>              
            </div>
        </div>
        <br>
<div class="row">
<div class="col-xs-6">
<div class="form-group">
<lable for='format_right'>Date Format Options: </lable>
<select class='form-control input-sm' id='format_right'>
<option value='mm/dd/yy'>Default - mm/dd/yy</option>
<option value='yy-mm-dd'>ISO 8601 - yy-mm-dd</option>
</select>
</div>
</div>
<div class='col-xs-6'>
<div class="form-group">
<label for='zip_right'>Zip Code:</label>
<select class='form-control input-sm' id='zip_right'>
<option value='33483'>33483</option>
<option value='33444'>33444</option>
<option value='33445'>33445</option>
<option value='0'>0</option>
</select>
</div>
    <input type='button' class='btn btn-success btn-sm' onclick='ajaxFunctionRight()' value='Get Data' />
</div>

</div>
</div>
</form>

    <div class='row' id='ajaxDivRight'>
        <div class='col-xs-12'></div>
    </div>
    <br>
</div>
    
    
    
<div class="chart-notes">
Notes about this chart
</div>
</div>
 <script>
$(document).ready(function() {

$('[data-toggle1="tooltip1"]').tooltip();

});

$(document).ready(function() {

$('[data-toggle2="tooltip2"]').tooltip();

});

$(document).ready(function() {

$('[data-toggle3="tooltip3"]').tooltip();

});


$(function() {

$("#datepicker_right").datepicker();

$("#format_right").change(function() {

    $("#datepicker_right").datepicker("option", "dateFormat", $(this).val());

});

});

//Browser Support Code
function ajaxFunctionRight() {
var ajaxRequestRight; // The variable that makes Ajax possible!
try {

    // Opera 8.0+, Firefox, Safari
    ajaxRequestRight = new XMLHttpRequest();
} catch (e) {

    // Internet Explorer Browsers
    try {
        ajaxRequestRight = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {

        try {
            ajaxRequestRight = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (e) {

            // Something went wrong
            alert("Your browser broke!");
            return false;
        }
    }
}

// Create a function that will receive data
// sent from the server and will update
// div section in the same page.
ajaxRequestRight.onreadystatechange = function() {

    if (ajaxRequestRight.readyState == 4) {
        var ajaxDisplayRight = document.getElementById('ajaxDivRight');
        ajaxDisplayRight.innerHTML = ajaxRequestRight.responseText;
    }
}

// Now get the value from user and pass it to
// server script.
var likesRight = document.getElementById('likes_right').value;
var tacRight = document.getElementById('tac_right').value;
var zipRight = document.getElementById('zip_right').value;
var datepickerRight = document.getElementById('datepicker_right').value;
var queryStringRight = "?likes_right=" + likes;

queryStringRight += "&tac_right=" + tacRight + "&zip_right=" + zipRight + "&datepicker_right=" + datepickerRight;
ajaxRequestRight.open("GET", "query_right.php" + queryStringRight, true);
ajaxRequestRight.send(null);
}
</script>   
</div><!--@end chart3-->
        
</div><!--@end #row1--> 
<div id="row2" class="row">

    <div id="chart4" class="col-xs-6">
        
        <div class="chart-wrapper">
            
            <div class="chart-title">Twitter Search</div>
            
            <div class="chart-stage">

                <?php 
require 'dashbrd_twitter/TwitterAPIExchange.php';
require 'dashbrd_twitter/twitterAPI-V2.php';
?>

            </div>
            
            <div class="chart-notes">Notes about this chart</div>
            
        </div>
        
    </div><!--@end chart4-->

    <div id="chart5" class="col-xs-6">
        <div class="chart-wrapper">
            <div class="chart-title">
                Instagram Search
            </div>
            <div class="chart-stage">
                <?php if (!isset($_POST['submit'])) { ?>
                    <form role="form" method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-4">
                                    <label for="lat">Latitude:</label>
                                    <input class="form-control input-sm" type="text" name="lat" />
                                </div>
                                <div class="col-xs-4">
                                    <label for="lng">Longitude:</label>
                                    <input class="form-control input-sm" type="text" name="long" />
                                </div>
                                <div class="col-xs-4">
                                    <label for="lat">Distance:</label>
                                    <input class="form-control input-sm" type="text" name="dist" />
                                </div>
                            </div>
                            <br>
                            <input type="submit" class="btn btn-success btn-sm" name="submit" value="Get Data" />
                        </div>
                    </form>

<?php
} else {
?>
<?php
try {
//$lat = 26.46327902884;
//$lng = -80.073262446032;
//$distance = 1000;
$client_id = "8c08ee58a2c14c76b9428ac828cf56e7";
$url = "https://api.instagram.com/v1/media/search?lat={$_POST['lat']}&lng={$_POST['long']}&distance={$_POST['dist']}&client_id={$client_id}";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 20);
$result = curl_exec($ch);
curl_close($ch); 
$result = json_decode($result);  
$data = $result->data; 
if (count($data) > 0) {
echo '<ul>';
foreach ($data as $item) {
echo '<li style="display: inline-block; padding: 25px; border: 1px solid #000 font-family: Helvetica; font-size: 12px;"><a href="' . 
$item->link . '"><img src="' . $item->images->thumbnail->url . 
'" /></a> <br/>';
echo 'By: <em>' . $item->user->username . '</em> <br/>';
echo 'Date: ' . date ('M d Y', $item->created_time) . '<br/>';
echo $item->comments->count . ' comment(s). ' . $item->likes->count . 
' likes. </li>';}
echo '</ul>';}} catch (Exception $e) {
echo 'ERROR: ' . $e->getMessage() . print_r($url);
exit;}}  
?>
            </div>
            <div class="chart-notes">
                Notes about this chart
            </div>
        </div>
    </div>
    <!--@end chart5-->

</div><!--@end #row2-->
<div id="chart5" class="col-xs-12">
<div class="chart-wrapper">
        <div class="chart-title">
            Chart Title
        </div>
        <div id= "map-canvas" class="chart-stage">

        </div>
        <div class="chart-notes">
            Notes:
        </div>
    </div>
</div><!--@end 1st .col-xs-6.row-->
<div id="chart6" class="col-xs-12">
    <div class="chart-wrapper">
        <div class="chart-title">
            Chart Title
        </div>
        <div id= "map-canvas" class="chart-stage">

        </div>
        <div class="chart-notes">
            Notes:
        </div>
    </div>
</div><!--@end 2nd .col-xs-6.row-->
<hr>
<p class="small text-muted">
    Built with &#9829; by 
    <a href="https://heatery.io">Heatery IO</a>
</p>
</div><!--@end #row_main--> 
</div><!--@end .container-fluid-->  
<script src="js/holder.js"></script>
<script>
Holder.add_theme("white", {
background: "#fff",
foreground: "#a7a7a7",
size: 10
});
</script>
<script src="js/keen.min.js"></script>
<script src="js/meta.js"></script>
</body>
</html>