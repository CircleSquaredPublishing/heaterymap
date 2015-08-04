<!DOCTYPE html>
<html>
<head>
<title>Localhost Heatery Geocode Testing</title>
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
<meta property="og:url" content="http://www.heatery.io/heateryMap/"/>
<meta property="og:type" content="website"/>
<meta property="og:title" content="The Delray Beach Heatery Map"/>
<meta property="og:description" content="Find the Best Places to Be in Delray Beach Like Never Before!" />
<meta property="og:image" content="http://www.heatery.io/wp-content/uploads/2015/07/Screenshot-2015-07-21-17.26.08.png"/>
<meta property="fb:app_id" content="1452021355091002"/>
<!----------TWITTER CARD: TAGS---------->
<meta name="twitter:card" content="summary_large_image"/>
<meta name="twitter:site" content="@DelrayInfo"/>
<meta name="twitter:title" content="The Delray Beach Heatery Map"/>
<meta name="twitter:description" content="Find the Hottest Restaurants in Delray Beach with the heatery.io Heatery Map!">
<meta name="twitter:creator" content="@DelrayInfo"/>
<meta name="twitter:image:src" content="http://www.heatery.io/wp-content/uploads/2015/07/Screenshot-2015-07-21-17.26.08.png"/>
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
ga('create', 'UA-64702784-1', 'auto');
ga('send', 'pageview');
</script>
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
<li class="active" ><a href="#">Heatery Map</a></li>  
<li><a href="#">About</a></li>
<li><a href="http://localhost/top10/index.php">Top 10</a></li>
<li><a href="#">Home</a></li>
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
            <span class="input-group-btn"><button id="ButtonSearch" class="btn btn-default btn-sm" onclick="codeAddress()" title="heatery"><span class="glyphicon glyphicon-search"></span></button>
            </span>
            <input id="address" type="text" class="form-control" style="width: 150px;" placeholder="Find Your Hot Spot.">
        </div>
    </div>

    <div>
        <div class="btn-group">
            <button id="toggle" class="btn btn-default btn-sm" onclick="toggleHeatmap()" title="heatmap"><span class="glyphicon glyphicon-off
"></span></button>
            <button id="radius" class="btn btn-default btn-sm" onclick="changeRadius()" title="radius"><span class="glyphicon glyphicon-fullscreen"></span></button>
            <button id="opacity" class="btn btn-default btn-sm" onclick="changeOpacity()" title="opacity"><span class="glyphicon glyphicon-adjust"></span></button>

        </div>
    </div>
</div>

<input id="pac-input" class="controls" type="text" placeholder="Places Search"/>
<div id="map-canvas"></div>
<script src="js/get_loc.js"></script>
<script>

//@FIXME Try using the input form to 'POST' the input to php script.
//@NOTE The opening map will be based on the users location assuming they allow access.

/*[x]@TODO Merge geolocation features with existing heatery features*/
/*@TODO Need an easy way to change search parameters. A slim drop down would be ideal.*/
/*@TODO Need to see if I can use the autocomplete search box in place of the existing one*/     

var geocoder; 
var map;  
  function displayMap(coords){
        var retro_style = new google.maps.StyledMapType(retroStyle,
        {name:'Retro'});
        var apple_style = new google.maps.StyledMapType(appleStyle,
        {name:'Apple'});
        var light_style = new google.maps.StyledMapType(lightStyle,
        {name:'Dusk'});
        var old_style = new google.maps.StyledMapType(oldStyle,
        {name:'Vintage'});
        var pale_style = new google.maps.StyledMapType(paleStyle,
        {name:'Cloud'});
        var brown_style = new google.maps.StyledMapType(brownStyle,
        {name:'Organic'});

    geocoder = new google.maps.Geocoder(); 
        var userPosition = new google.maps.LatLng(coords.latitude, coords.longitude);
        var mapOptions = {
        zoom: 13,
        center: userPosition,
        panControl: false,
        zoomControl: true,
        mapTypeControl: true,
        mapTypeControlOptions: {
        style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
        position: google.maps.ControlPosition.TOP_RIGHT,
        mapTypeIds: ['Retro', 'Apple', 'Dusk', 'Vintage','Cloud','Organic', 
             google.maps.MapTypeId.ROADMAP, 
             google.maps.MapTypeId.SATELLITE, 
             google.maps.MapTypeId.TERRAIN]
            }

        };  
        map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
        map.mapTypes.set('Retro', retro_style);
        map.mapTypes.set('Apple', apple_style);
        map.mapTypes.set('Dusk', light_style);
        map.mapTypes.set('Vintage', old_style);
        map.mapTypes.set('Cloud', pale_style);
        map.mapTypes.set('Organic', brown_style);
        map.setMapTypeId('Vintage');

//Insert Google Search 
var markers = [];    
var input =/**@type {HTMLInputElement}**/(document.getElementById('pac-input')); 
map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
var searchBox = new google.maps.places.SearchBox((input));
google.maps.event.addListener(searchBox, 'places_changed', function () {
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
google.maps.event.addListener(map, 'bounds_changed', function () {
var bounds = map.getBounds();
searchBox.setBounds(bounds);
});
}          
google.maps.event.addDomListener(window, 'load', displayMap);
</script>
<script src="js/ajax.js"></script>
</body>
</html>