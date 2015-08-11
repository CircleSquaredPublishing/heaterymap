<!DOCTYPE html>
<html>

<head>
    <title>GEOCODED MAP MARKERS</title>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--------------------EXTERNAL LIBRARIES, SCRIPTS & STYLESHEETS-------------------->
    
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script><!--@ end jQuery-->

    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=false&libraries=visualization,places">
    </script><!--@ end Google Maps-->

    <link rel="stylesheet" type="text/css" href="../geocodedmap-master/css/style.css" /><!--@ end local stylesheet-->

    <link rel="stylesheet" type="text/css" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css" /><!--@ end jQuery Smoothness stylesheet. Used for street view windows-->

    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" /><!--@ end Bootstrap CSS-->

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script><!--@ end Bootstrap JS-->

    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script><!--@ end jQuery UI-->
    <script src="../geocodedmap-master/js/custom_style.js"></script><!--@ end Custom Layer JSON-->

</head>

<!--------------------BEGIN CONTENT-------------------->

<body style="background-color: #000">

    <nav class="navbar navbar-inverse">

        <div class="container-fluid">

            <div class="navbar-header">

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>

                </button>
                <!--@end .navbar-toggle-->

                <a class="navbar-brand" href="#">heatery.io</a>

            </div>
            <!--@end .navbar-header-->

            <div class="collapse navbar-collapse" id="myNavbar">

                <ul class="nav navbar-nav">

                    <li class="active"><a href="#">BETA: Heatery Map Markers</a></li>


                </ul>
                <!--@end .nav navbar-nav-->

                <ul class="nav navbar-nav navbar-right">

                    <li><a href="#"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;Client Portal</a></li>

                    <li><a href="#"><span class="glyphicon glyphicon-log-in"></span>&nbsp;&nbsp;The Speak Easy</a></li>

                </ul>
                <!--@end .nav navbar-nav navbar-right-->

            </div>
            <!--@end #myNavbar-->

        </div>
        <!--@end .container-fluid-->

    </nav>
    <!--@end .navbar navbar-inverse-->

    <div class="Toolbar">
        <div>
            
        <form action="" method="post">
            
            <div class="input-group input-group-sm">
                
                <span class="input-group-btn"><input  class="btn btn-success" id="ButtonSearch" type="submit" class="btn btn-default btn-sm" onclick="codeAddress()" value="Get Heatery"><span class="glyphicon glyphicon-search"></span></span>
                
                <input name="address" type="text" class="form-control" style="width: 150px;" placeholder="Find Your Hot Spot.">
                
            </div><!--@end Input field for PHP Geocoder-->
        </form><!--@end form for PHP Geocoder-->
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

<div id="map-canvas"></div><!--@end #map-canvas-->


<?php
if($_POST){
 
    // get latitude, longitude and formatted address
    $data_arr = geocode($_POST['address']);
 
    // if able to geocode the address
    if($data_arr){
         
        $latitude = $data_arr[0];
        $longitude = $data_arr[1];
        $city = $data_arr[2];
        
                     
?>

        <?php require_once '../geocodedmap-master/functions/conn.php';?>
    
            <?php require_once '../geocodedmap-master/functions/select.php';?>
    
                <script>
                    function init_map() {
                        var myOptions = {
                            zoom: 14,
                            center: new google.maps.LatLng(<?php echo $latitude; ?>, <?php echo $longitude; ?>),
                            mapTypeId: google.maps.MapTypeId.ROADMAP
                        };
                        map = new google.maps.Map(document.getElementById("map-canvas"), myOptions);


                        <?php require_once '../geocodedmap-master/functions/insert.php';?>

                        <?php require_once '../geocodedmap-master/functions/add_markers.php';?>
                    }

/*@NOTE The heatmaps delivered from the search box input are produced by the jQuery AJAX function and the call to the FB API.*/
/*@NOTE Map markers are currently being added using the PHP Google Geocoder because the marker data is being sent to the database for storage and processnig.*/
/*@FIXME This script needs PHP geocoder functionality. Try adding Click Event.*/
//Declare variables in the global scope.     

                    google.maps.event.addDomListener(window, 'load', init_map);
                </script>

                <?php
 
    // if unable to geocode the address
    }else{
        echo "No map found.";
    }
}
?>


<?php
// function to geocode address, it will return false if unable to geocode address
function geocode($address){
 
    // url encode the address
    $address = urlencode($address);
     
    // google map geocode api url
    $url = "http://maps.google.com/maps/api/geocode/json?sensor=false&address={$address}";
 
    // get the json response
    $resp_json = file_get_contents($url);
     
    // decode the json
    $resp = json_decode($resp_json, true);
 
    // response status will be 'OK', if able to geocode given address 
    if($resp['status']='OK'){
 
        // get the important data
        $lati = $resp['results'][0]['geometry']['location']['lat'];
        $longi = $resp['results'][0]['geometry']['location']['lng'];
        $city = $resp['results']['0']['address_components']['0']['long_name'];
         
        // verify if data is complete
        if($lati && $longi && $city){
         
            // put the data in the array
            $data_arr = array();            
             
            array_push(
                $data_arr, 
                    $lati, 
                    $longi, 
                    $city
                );
             
            return $data_arr;
             
        }else{
            return false;
        }
         
    }else{
        return false;
    }
}

/*@FIXME Need to fit bounds to marker spread.*/
/*@NOTE Uses query_top_ten.php to select results.*/
?>

</body>

</html>