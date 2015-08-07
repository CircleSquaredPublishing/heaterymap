<!DOCTYPE html>
<html>
<title>STREET VIEW INFOWINDOWS</title>
<meta charset= "UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
<!----------EXTERNAL LIBRARIES, SCRIPTS & STYLESHEETS---------->   
<link rel="stylesheet" href="/github/geocodedmap-master/css/style.css" />

<link rel="stylesheet" type="text/css" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css" />

<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=false&libraries=visualization,places">
</script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>

<script src="/github/geocodedmap-master/js/custom_style.js"></script>

<?php include '/packages/vendor/autoload.php';?>

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

  </button><!--@end .navbar-toggle-->

  <a class="navbar-brand" href="http://www.heatery.io">heatery.io</a>

</div><!--@end .navbar-header-->

<div class="collapse navbar-collapse" id="myNavbar">

  <ul class="nav navbar-nav navbar-right">

    <li><a href="#"><span class="glyphicon glyphicon-user"></span>Client Portal</a></li>

    <li><a href="#"><span class="glyphicon glyphicon-log-in"></span>The Speak Easy</a></li>

  </ul><!--@end .nav navbar-nav navbar-right-->

</div><!--@end .collapse navbar-collapse-->

</div><!--@end .container-fluid-->

</nav><!--@end .navbar navbar-inverse-->

<div id="map-canvas"></div><!--@end #map-canvass-->
    
<div id="dialog-sw-canvas"></div><!--@end #dialog-sw-canvas-->

<script src="js/dialog.js"></script>
    
<!----------BEGIN JAVASCRIPT---------->   
<script>

var map;
var marker;
var panoramaOptions;
var panorama;

function initialize() {
    var center = new google.maps.LatLng(26.461635, -80.071123);
    var sv = new google.maps.StreetViewService();

    /*Map Options*/
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

    var mapOptions = {

        zoom: 13,
        center: center,
        mapTypeControlOptions: {
            style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
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


/*Create Map markers*/
function addMarker(feature) {
    
    var marker = new google.maps.Marker( {
            position: feature.position,
            map: map
        });
    
/*Create Infowindow*/
    var infowindow = new google.maps.InfoWindow();

    var content = 
            '<div id="iwsw" class="iwsw">Street View</div>';
    
/*Call StreetView*/
    google.maps.event.addDomListener(infowindow, 'domready', function() {
        
            $('.iwsw').click(function() {
                
                showStreetView(feature.position);
                
            });
        
        });


google.maps.event.addListener(marker, 'click', (function(marker, content, infowindow) {

            return function() {
                infowindow.setContent(content);
                infowindow.open(map, marker);
            };

        })(marker, content, infowindow));

    }


var features = 
[{position: new google.maps.LatLng(26.465164,-80.067749)},
{position: new google.maps.LatLng(26.466343,-80.070946)},
{position: new google.maps.LatLng(26.461624,-80.067558)},
{position: new google.maps.LatLng(26.472651,-80.097183)},
{position: new google.maps.LatLng(26.462049,-80.068222)},
{position: new google.maps.LatLng(26.438536,-80.071327)},
{position: new google.maps.LatLng(26.46467,-80.070908)},
{position: new google.maps.LatLng(26.439342,-80.079956)},
{position: new google.maps.LatLng(26.461578,-80.068565)},
{position: new google.maps.LatLng(26.439751,-80.069374)},
{position: new google.maps.LatLng(26.466434,-80.071022)},
{position: new google.maps.LatLng(26.461905,-80.071007)},
{position: new google.maps.LatLng(26.452065,-80.088219)},
{position: new google.maps.LatLng(26.461889,-80.06781)},
{position: new google.maps.LatLng(26.46476,-80.07093)},
{position: new google.maps.LatLng(26.461361,-80.072739)},
{position: new google.maps.LatLng(26.466089,-80.071281)},
{position: new google.maps.LatLng(26.461185,-80.063805)},
{position: new google.maps.LatLng(26.465658,-80.066971)},
{position: new google.maps.LatLng(26.461901,-80.060158)},
{position: new google.maps.LatLng(26.442314,-80.07019)},
{position: new google.maps.LatLng(26.46139,-80.058678)},
{position: new google.maps.LatLng(26.461479,-80.070877)},
{position: new google.maps.LatLng(26.464172,-80.068962)},
{position: new google.maps.LatLng(26.460421,-80.071243)},
{position: new google.maps.LatLng(26.461189,-80.066254)},
{position: new google.maps.LatLng(26.461525,-80.068443)},
{position: new google.maps.LatLng(26.46328,-80.073441)},
{position: new google.maps.LatLng(26.461515,-80.072876)},
{position: new google.maps.LatLng(26.461363,-80.067863)},
{position: new google.maps.LatLng(26.46139,-80.072433)},
{position: new google.maps.LatLng(26.460768,-80.093857)},
{position: new google.maps.LatLng(26.461611,-80.07074)},
{position: new google.maps.LatLng(26.461525,-80.068443)},
{position: new google.maps.LatLng(26.464937,-80.070992)},
{position: new google.maps.LatLng(26.460926,-80.058586)},
{position: new google.maps.LatLng(26.482901,-80.065559)},
{position: new google.maps.LatLng(26.461149,-80.058464)},
{position: new google.maps.LatLng(26.461929,-80.069832)},
{position: new google.maps.LatLng(26.460911,-80.058731)},
{position: new google.maps.LatLng(26.461929,-80.068703)},
{position: new google.maps.LatLng(26.461929,-80.070663)},
{position: new google.maps.LatLng(26.461351,-80.068138)},
{position: new google.maps.LatLng(26.461542,-80.071465)},
{position: new google.maps.LatLng(26.441957,-80.072083)},
{position: new google.maps.LatLng(26.43828,-80.072174)},
{position: new google.maps.LatLng(26.461941,-80.070511)},
{position: new google.maps.LatLng(26.439388,-80.082886)},
{position: new google.maps.LatLng(26.461651,-80.071945)},
{position: new google.maps.LatLng(26.458286,-80.110733)}
];


    for (var i = 0, feature; feature = features[i]; i++) {
        
            addMarker(feature);
        
        }

    }

google.maps.event.addDomListener(window, 'load', initialize);
    
</script><!--@end initialize function-->
<script src="js/sv_main.js"></script>    
</body><!--@end body & content-->
</html><!--@end html & page-->