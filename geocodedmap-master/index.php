<!DOCTYPE html>
<html>
<head>
<title>Github Master</title>
<meta charset= "UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
    
<!----------EXTERNAL LIBRARIES, SCRIPTS & STYLESHEETS---------->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>       
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=false&libraries=visualization,places">
</script> 
<link rel="stylesheet" type="text/css" href="css/style.css"/> 
<link rel="stylesheet" type="text/css" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css"/>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"/>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
<script src="js/custom_style.js"></script> 
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
                <a class="navbar-brand" href="#">heatery.io</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Heatery Map</a></li>

                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;Client Portal</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-log-in"></span>&nbsp;&nbsp;The Speak Easy</a></li>
                </ul>
            </div>
        </div>
    </nav>
<div class="Toolbar">
    <div>
        <div class="input-group input-group-sm">
            <span class="input-group-btn"><button id="ButtonSearch" class="btn btn-default btn-sm" onclick="codeAddress()" title="Search"><span class="glyphicon glyphicon-search"></span></button>
            </span>
            <input id="address" type="text" class="form-control" style="width: 150px;" placeholder="Find Your Hot Spot.">
        </div>
    </div>

    <div>
        <div class="btn-group">
            <button id="toggle" class="btn btn-default btn-sm" onclick="toggleHeatmap()" data-toggle="tooltip" title="Heatmap On/Off"><span class="glyphicon glyphicon-off
"></span></button>
            <button id="radius" class="btn btn-default btn-sm" onclick="changeRadius()" data-toggle="tooltip" title="Change Radius"><span class="glyphicon glyphicon-fullscreen"></span></button>
            <button id="opacity" class="btn btn-default btn-sm" onclick="changeOpacity()" data-toggle="tooltip" title="Change Opacity"><span class="glyphicon glyphicon-adjust"></span></button>

        </div>
        <!--@end .btn-group-->
    </div>
    <!--@end #toolbar-btns .btn-group-->
</div>
<!--@end #inputs .Toolbar-->

    <input id="pac-input" class="controls" type="text" placeholder="Search for Places" autocomplete="on"/>
    <div id="map-canvas"></div>
    <!--@end #map-canvas-->
    <script src="js/get_loc.js"></script>
    
<script>

var heatmap;
var geocoder; 
var map;  

$(function() {
    $('[data-toggle="tooltip"]').tooltip()
});

  function displayMap(coords){
        var retro_style = new google.maps.StyledMapType(retroStyle,
        {name:"Retro"});
        var apple_style = new google.maps.StyledMapType(appleStyle,
        {name:"Apple"});
        var light_style = new google.maps.StyledMapType(lightStyle,
        {name:"Dusk"});
        var old_style = new google.maps.StyledMapType(oldStyle,
        {name:"Vintage"});
        var pale_style = new google.maps.StyledMapType(paleStyle,
        {name:"Cloud"});
        var brown_style = new google.maps.StyledMapType(brownStyle,
        {name:"Organic"});

    geocoder = new google.maps.Geocoder(); 
        var successPosition = new google.maps.LatLng(coords.latitude, coords.longitude);
        var mapOptions = {
        zoom: 13,
        center: successPosition,
        panControl: false,
        zoomControl: true,
        mapTypeControl: true,
        mapTypeControlOptions: {
        style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
        position: google.maps.ControlPosition.TOP_RIGHT,
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

//Insert Google Search 
var markers = [];    
var input =/**@type {HTMLInputElement}**/(document.getElementById("pac-input")); 
//map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
var searchBox = new google.maps.places.SearchBox((input));
google.maps.event.addListener(searchBox, "places_changed", function () {
var places = searchBox.getPlaces();
if (places.length == 0) {
return;
}
for (var i = 0, marker; marker = markers[i]; i++) {
marker.setMap(null);
}
var bounds = new google.maps.LatLngBounds();
for (var i = 0, place; place = places[i]; i++) {
var marker = new google.maps.Marker({
map: map,
title: place.name,
position: place.geometry.location
});
markers.push(marker);
bounds.extend(place.geometry.location);
}
map.fitBounds(bounds);
});
google.maps.event.addListener(map, "bounds_changed", function () {
var bounds = map.getBounds();
searchBox.setBounds(bounds);
});
}          
google.maps.event.addDomListener(window, "load", displayMap);
</script>
<script src="js/ajax.js"></script> 
</body>
</html>