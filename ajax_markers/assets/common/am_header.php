<?php
/*
Template Name: Heatery Map
Author: Circle Squared Data Labs
Author URI: http://www.heatery.io
Description: This is the Heatery Map page for heatery.io. This template includes 6 custom styles plus 3 Traditional Google Maps styles. It has a jQuery AJAX call coded to retrieve public restaurant data from the Facebook Graph API. The toolbar has been configured with links to more content and is styled using Bootstrap.
Version: 1.0.0
License: Except as otherwise noted, the content of this page is licensed under the Creative Commons Attribution 3.0 License, and code samples are licensed under the Apache 2.0 License.
License URI: license.txt
Tags: responsive-layout, fluid-layout, custom-background, custom-menu, custom-maps, AJAX, Facebook Graph API, Heatmap Visualizations, Google Maps, Bootstrap, Heatery, Circle Squared Data Labs, restaurants, social media analysis, spatial data analysis
*/
?>
<!DOCTYPE html>
<html>
<head>
<title>AJAX Heatery Markers</title>
    
<!-- BEGIN META TAGS -->
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

<!-- GOOGLE ANALYTICS TRACKING CODE -->
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

<!-- - - - - - - - - - - EXTERNAL ASSETS - - - - - - - - - - -->

<!-- JQUERY 2.1.4 -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

<!-- GOOGLE MAPS V3.EXP INCLUDES VISUALIZATION AND PLACES LIBRARIES  -->    
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=false&libraries=visualization,places"></script> 

<!-- JQUERY SMOOTHNESS THEME USED FOR STYLING STREETVIEW INSIDE INFOWINDOWS -->    
<link rel="stylesheet" type="text/css" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css"/>

<!-- BOOTSTRAP 3.3.5 MINIFIED CSS -->    
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"/>

<!-- GOOGLE FONTS LATO 400 -->    
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lato:400">

<!-- GOOGLE FONTS SOURCE SANS PRO 400, 900 -->    
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,900">

<!-- BOOTSTRAP 3.3.5 MINIFIED JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<!-- JQUERY 1.11.2 MINIFIED JS -->    
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>

<!-- HEATERY CUSTOM MAP LAYERS -->    
<script src="/github/ajax_markers/assets/js/am_layers_min.js"></script>
    
<!-- HEATERY STYLESHEET -->
<link rel="stylesheet" type="text/css" href="/github/ajax_markers/assets/css/am_style.css" />
</head>  
    
<!-- BEGIN CONTENT -->    
<body> 