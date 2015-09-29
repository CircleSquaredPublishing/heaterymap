<?php 
/*
File Name: hm_header.php
Author: Circle Squared Data Labs
Author URI: http://www.heatery.io
Description: This is the Heatery Map page for heatery.io. This template includes 6 custom styles plus 3 Traditional Google Maps styles. It has a jQuery AJAX call coded to retrieve public restaurant data from the Facebook Graph API. The toolbar has been configured with links to more content and is styled using Bootstrap.
Version: 2.0.0
License: Except as otherwise noted, the content of this page is licensed under the Creative Commons Attribution 3.0 License, and code samples are licensed under the Apache 2.0 License.
License URI: license.txt
Tags: responsive-layout, fluid-layout, custom-background, custom-menu, custom-maps, AJAX, Facebook Graph API, Heatmap Visualizations, Google Maps, Bootstrap, Heatery, Circle Squared Data Labs, restaurants, social media analysis, spatial data analysis
*/
?>
<!DOCTYPE html>
<html>
<head>
<title>
<?php 
if(isset($pg_title) && is_string($pg_title)){
    echo $pg_title;
}else{
    echo 'Find Your Hot Spot.';
}
?>
</title>
<script>
if (screen.width <=699){
    document.location = "https://www.mobile.heatery.io/";
}    
</script>    
    
<!-- BEGIN META TAGS -->
<meta charset="UTF-8" />
<meta name="p:domain_verify" content="99be6fb68b0c975e69a515c6fad020ab" />
<meta property="fb:app_id" content="1452021355091002" />
<meta name='yandex-verification' content='4a2af8bc9af8ffa5' />
<meta name="alexaVerifyID" content="RZ-VW1FIkLhufpGOHO8oCry4swk" />
<meta name="google-site-verification" content="hLFvZbrU2DgALxyrC2fQPOE8n2Dk0Ri58qbT_RIdhkI" />
<meta name="google-site-verification" content="Y9hyPVrpJzkcgV58YBmyU6BWV6d-hiIwAnQgTv66QfY" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="author" content="Circle Squared Data Labs" />
<meta name="author" content="Circle Squared Data Labs" />
<meta property="og:url" content="https://www.heatery.io/heaterymap/" />
<meta property="og:type" content="article" />
<meta property="og:title" content="Heatery Map: Find Your Hot Spot." />
<meta property="og:description" content="Find the hottest restaurants in your area or anywhere in the world with the Heatery Map." />
<meta property="og:image" content="https://www.heatery.io/hm-media/hm-img/hm_fb_og_img.png" />
    
<!-- - - - - - - - - - - EXTERNAL ASSETS - - - - - - - - - - -->
<!-- HEATERY STYLESHEET -->
<link rel="stylesheet" type="text/css" href= "hm-assets/hm-css/hm_belgium.css" />
<!-- BOOTSTRAP 3.3.5 MINIFIED CSS -->
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" /> 
<!-- JQUERY 2.1.4 -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<!-- GOOGLE MAPS V3.EXP INCLUDES VISUALIZATION AND PLACES LIBRARIES  -->
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=false&libraries=visualization,places,geometry"></script>
<!-- BOOTSTRAP 3.3.5 MINIFIED JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<!-- JQUERY 1.11.4 MINIFIED JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<!-- HEATERY CUSTOM MAP LAYERS -->
<script src="hm-assets/hm-js/hm_map_layers_min.js"></script>

</head>
    <body style="background-color:#666;">