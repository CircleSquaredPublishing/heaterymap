<!DOCTYPE html>
<html>
<head>
<title>Welcome to heatery.io</title>
<meta charset= "UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<!----------EXTERNAL LIBRARIES, SCRIPTS & STYLESHEETS---------->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>       
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=false&libraries=visualization,places">
</script> 
<link rel="stylesheet" type="text/css" href="/github/geocodedmap-master/css/style.css"/> 
<link rel="stylesheet" type="text/css" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css"/>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"/>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
<script src="/github/geocodedmap-master/js/custom_style.js"></script> 
</head> 
<!----------BEGIN CONTENT---------->  
<body style="background-color: #000">
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="http://www.heatery.io/wp-login.php">heatery.io</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="http://www.heatery.io/wp-login.php">Heatery Map</a></li>
                    <li><a href="http://www.heatery.io/wp-login.php">About</a></li>
                    <li><a href="http://www.heatery.io/wp-login.php">Top 10</a></li>
                    <li><a href="http://www.heatery.io/wp-login.php">Home</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="http://www.heatery.io/wp-login.php"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;Client Portal</a></li>
                    <li><a href="http://www.heatery.io/wp-login.php"><span class="glyphicon glyphicon-log-in"></span>&nbsp;&nbsp;The Speak Easy</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div id="map-canvas"></div>
    <!--@end #map-canvas-->
<script>    
var map;
function displayMap(){
    var retro_style = new google.maps.StyledMapType(retroStyle,{name:"Retro"});
    var apple_style = new google.maps.StyledMapType(appleStyle,{name:"Apple"});
    var light_style = new google.maps.StyledMapType(lightStyle,{name:"Dusk"});
    var old_style = new google.maps.StyledMapType(oldStyle,{name:"Vintage"});
    var pale_style = new google.maps.StyledMapType(paleStyle,{name:"Cloud"});
    var brown_style = new google.maps.StyledMapType(brownStyle,{name:"Organic"});
    var center = new google.maps.LatLng(36,-95);
    var mapOptions = {
        zoom: 5,
        center: center,
        disableDoubleClickZoom: true,
        draggable: false,
        keyboardShortcuts: false,
        scrollwheel: false,
        streetViewControl: false,
        panControl: false,
        zoomControl: false,
        mapTypeControl: true,
        mapTypeControlOptions: {
        style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
        position: google.maps.ControlPosition.RIGHT_TOP,
        mapTypeIds: ["Retro", "Apple", "Dusk", "Vintage","Cloud","Organic", 
             google.maps.MapTypeId.ROADMAP, 
             google.maps.MapTypeId.SATELLITE, 
             google.maps.MapTypeId.TERRAIN]
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
    }   
google.maps.event.addDomListener(window, "load", displayMap);
    </script>   
    <script src="us_city_calls/city_calls_minified.js"></script>
    </body>
</html>