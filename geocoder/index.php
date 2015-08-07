<!DOCTYPE html>
<html>
<head>
<title>PHP GEOCODER</title>  
<meta charset= "UTF-8">  
<meta name="viewport" content="width=device-width, initial-scale=1">
    
<!----------EXTERNAL LIBRARIES, SCRIPTS & STYLESHEETS---------->
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="/github/geocodedmap-master/css/style.css"/>     
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
                
                <a class="navbar-brand" href="#">heatery.io</a>
                
            </div><!--@end .navbar-header-->
            
            <div class="collapse navbar-collapse" id="myNavbar">
                
                <ul class="nav navbar-nav">
                    
                    <li class="active"><a href="#">Heatery Map</a></li>
                    
                    <li><a href="#">About</a></li>
                    
                    <li><a href="http://localhost/top10/index.php">Top 10</a></li>
                    
                    <li><a href="#">Home</a></li>
                    
                </ul><!--@end .nav navbar-nav-->
                
                <ul class="nav navbar-nav navbar-right">
                    
                    <li><a href="#"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;Client Portal</a></li>
                    
                    <li><a href="#"><span class="glyphicon glyphicon-log-in"></span>&nbsp;&nbsp;The Speak Easy</a></li>
                    
                </ul><!--@end .nav navbar-nav navbar-right-->
                
            </div><!--@end #myNavbar-->
            
        </div><!--@end .container-fluid-->
        
    </nav><!--@end .navbar navbar-inverse-->
    
<!----------PHP GEOCODER FORM---------->    
<div id="geocoder" class="container">
    <div>
    <h2>heatery.io</h2>
    <p>Explore what's hot in your neighborhood! Enter a location for the heatery top ten.</p>
    <table class="table table-bordered table-hover">
        <form action="" method="post">
            <div class="input-group">
      <span class="input-group-btn">
            <input class="btn btn-success btn-md" type="submit" value="Get Heatery" /><br /></span>
            <!--@end Button for PHP Geocoder-->
            <input id="search-box-tt" class="form-control" type="text" name="address" placeholder="Find Your Hot Spot." /></div><br>
            <!--@end Input field for PHP Geocoder-->
        </form>
        <!--@end form for PHP Geocoder-->
<!----------DB CONNECT---------->    
<?php require_once "test_connect.php";?>
    
<?php

/*Posts form input and calls Google Geocoder*/
require_once "test_post_geocode.php";

/*@var $latitude and $longitude are passed into $curl for FB API call*/
require_once "test_insert.php";

/*Sets heatery_score column in DB*/
require_once "test_set_heatery.php";

/*@FIXME Right now the results are display in a table but we need them passed into markers and placed on the map.*/
/*@FIXME This script needs to be able to pass geocoded data to Google Map Marker objects.*/
require_once "test_set_table.php";

$conn = null;
?>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>  
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>        