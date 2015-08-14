<?php 
/*
Template Name: Landing Page
Author: Circle Squared Data Labs
Author URI: http://www.heatery.io
Description: This is the Landing Page for heatery.io. This template includes 6 custom styles plus 3 Traditional Google Maps styles. It has a jQuery AJAX call coded to retrieve public restaurant data from the Facebook Graph API. The toolbar has been configured with links to more content and is styled using Bootstrap. We think this is a nice starting point for discovering the possibilities of custom data visualizations. 
Version: 1.0.0
License: Except as otherwise noted, the content of this page is licensed under the Creative Commons *Attribution 3.0 License, and code samples are licensed under the Apache 2.0 License.
License URI: license.txt
Tags: responsive-layout, fluid-layout, custom-background, custom-menu, custom-maps, AJAX, Facebook Graph API, Autocomplete SearchBox, Heatmap Visualizations, Google Maps

*/
/*@NOTE Heatmap is generated from a static set of point that will be updated periodically. A dynamic dataset was originally created but we have been unable to address browser crashing issues due to the number of points loaded into the map. It should be noted though that the heatmap display is quite different as far a sdistribution of points is concerned even though the same query was used to generate those points. Both of the above should be addressed because ideally all content would be dynamic.*/

?>
<!DOCTYPE html>
<html>
<head>
<title>Welcome to heatery.io</title>
	<meta charset="UTF-8" />
    <meta name="p:domain_verify" content="99be6fb68b0c975e69a515c6fad020ab"/>
    <meta property="fb:app_id" content="1452021355091002" />
    <meta name='yandex-verification' content='4a2af8bc9af8ffa5' />
    <meta name="alexaVerifyID" content="RZ-VW1FIkLhufpGOHO8oCry4swk"/>
    <meta name="google-site-verification" content="hLFvZbrU2DgALxyrC2fQPOE8n2Dk0Ri58qbT_RIdhkI" />
	<meta name="google-site-verification" content="Y9hyPVrpJzkcgV58YBmyU6BWV6d-hiIwAnQgTv66QfY" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="Circle Squared Data Labs" />
	<script>
			(function(i, s, o, g, r, a, m) {
				i['GoogleAnalyticsObject'] = r;
				i[r] = i[r] || function() {
					(i[r].q = i[r].q || []).push(arguments)
				}, i[r].l = 1 * new Date();
				a = s.createElement(o),
					m = s.getElementsByTagName(o)[0];
				a.async = 1;
				a.src = g;
				m.parentNode.insertBefore(a, m)
			})(window, document, 'script',
				'//www.google-analytics.com/analytics.js', 'ga');
			ga('create', 'UA-64702784-1', 'auto');
			ga('send', 'pageview');
		</script>
<!----------EXTERNAL LIBRARIES, SCRIPTS & STYLESHEETS---------->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>       
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=false&libraries=visualization,places">
</script> 
<link rel="stylesheet" type="text/css" href="https://www.heatery.io/css/style.css"/> 
<link rel="stylesheet" type="text/css" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css"/>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"/>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
<script src="https://www.heatery.io/js/custom_style.js"></script> 
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
                <a class="navbar-brand" href="https://www.heatery.io/wp-login.php">heatery.io</a>
            </div>
            
<div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
    <li class="active"><a href="#">The United States Heatery Map</a></li>

                </ul>
                <ul class="nav navbar-nav navbar-right">
                    
                    <li>
                        <a href="https://www.heatery.io/wp-login.php">Login</a>
                    </li>
                    
                    <li>
                        <a href="https://www.heatery.io/wp-login.php?action=register">Register</a>
                    </li>
                    
                    <li data-toggle="tooltip" title="Business partners gain access to rich data sets, custom reports, and personalized tools for analytics. All in addition to the this snazzy portal link!">
                        <a href="https://www.heatery.io/wp-login.php">
                            <span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;Client Portal
                        </a>
                    </li>
                    
                   <li data-toggle="tooltip" title="Just like our business partners, contributors to The Speak Easy get their own snazzy portal link too! The Speak Easy is our hand selected crew of objective critics who play an integral role in refining the heatery algorithm. Who are our critics? We will never tell...but our Blind Tiger members gain access to their reviews. Heatery Business partners will have access to reviews as well as the data our engineers use to feed the heatery model.">
                        <a href="https://www.heatery.io/wp-login.php">
                            <span class="glyphicon glyphicon-log-in"></span>&nbsp;&nbsp;The Speak Easy
                        </a>
                    </li>
                </ul>
            </div>
            
            
        </div>
    </nav>
    <div id="map-canvas"></div>
    <!--@end #map-canvas-->
<script src="https://www.heatery.io/js/hm_layer_minified.js"></script>
<script>
    
$(function() {
    $('[data-toggle="tooltip"]').tooltip()
});    
    
var map, pointArray, heatmap;
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
    
        var gradientNew=["rgba(0,255,255,0)","rgba(25,22,218,1)","rgba(17,191,225,1)","rgba(16,227,217,1)","rgba(15,229,173,1)","rgba(14,231,128,1)","rgba(13,233,82,1)","rgba(12,235,34,1)","rgba(37,237,11,1)","rgba(85,239,10,1)","rgba(134,241,8,1)","rgba(185,243,7,1)","rgba(237,245,6,1)","rgba(247,203,5,1)","rgba(249,152,3,1)","rgba(251,100,2,1)","rgba(255,127,131,1)","rgba(253,47,1,1)","rgba(255,0,7,1)"];
var pointArray = new google.maps.MVCArray(heatmapLayer);
    
        heatmap = new google.maps.visualization.HeatmapLayer({
        data: pointArray,
        radius: 30,
        opacity: .3,
        gradient: gradientNew,
        map: map
        });
    
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
    </body>
</html>