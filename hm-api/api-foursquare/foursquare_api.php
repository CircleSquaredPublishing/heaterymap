<?php
/*
Template Name: Foursquare API
Author: Circle Squared Data Labs
Author URI: http://www.heatery.io
Description: Call to the Foursquare API
Version: 0.1.0
License: Except as otherwise noted, the content of this page is licensed under the Creative Commons Attribution 3.0 License, and code samples are licensed under the Apache 2.0 License.
License URI: license.txt
Tags: responsive-layout, fluid-layout, custom-background, custom-menu, custom-maps, AJAX, Facebook Graph API, Heatmap Visualizations, Google Maps, Bootstrap, Heatery, Circle Squared Data Labs, restaurants, social media analysis, spatial data analysis
*/
?>
<!DOCTYPE html>
<html>
<head>
    <?php $pg_title = 'Sidebar: Foursquare API';?>
        <title>
            <?php 
if(isset($pg_title) && is_string($pg_title)) {
echo $pg_title;
} else {
echo 'Find Your Hot Spot.';
}
?>
        </title>
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
        <!-- - - - - - - - - - - EXTERNAL ASSETS - - - - - - - - - - -->
        <!-- JQUERY 2.1.4 -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <!-- BOOTSTRAP 3.3.5 MINIFIED CSS -->
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />
        <!-- BOOTSTRAP 3.3.5 MINIFIED JS -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <!-- JQUERY 1.11.4 MINIFIED JS -->
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    
<style>

html,body {
height: 100%;
background-color: #666;
color:#666;
font-family: Helvetica Neue, Arial, sans-serif;
font-weight:200;
}

body {
padding-top: 50px;
padding-bottom:50px;
}

p {
padding-right: 10px;
text-align: justify;
}

hr {
margin-top: 5px;
margin-bottom: 10px;
border-top: 1px solid #d1b166;
}

a {
color: #524204;
text-decoration: none;
font-size: 14px;
font-weight: 200;
}

a:hover {
color: #0F0;
}

td, th{
text-align:center;
width: 33.333333%;
}

.row{
margin-right:0px;
margin-left:0px;
}    

.table-striped>tbody>tr:nth-of-type(odd){
background-color: #d1b166;
color: #666;
}

.table-bordered>thead>tr>td, .table-bordered>thead>tr>th{
color:#D5DED9;
}

.navbar-default .navbar-nav>li>a {
color:#DCF7F3;
}

/*Begin Navbar*/
#hm_navbar_top, #hm_navbar_bottom, #hm_navbar_collapse {
background-color: #303030;
border-color: transparent !important;
color: #DCF7F3;
}

#hm_navbar_brand_img{
height:45px;
width:45px;
margin-top: -11px;
}

#hm_navbar_top li>a:hover,#hm_navbar_top .active>a,#hm_navbar_top li>a:focus,#hm_navbar_bottom li>a:hover,#hm_navbar_bottom .active>a,#hm_navbar_bottom li>a:focus {
background: rgba(255,255,255,0.2);
color: #DCF7F3;
}

#hm_navbar_dropdown_ul, #hm_dropup_dev, #hm_dropup_blog{
background-color: rgba(0,0,0, 0.5);
padding: 8px;
}

.dropdown-menu>li>a {
color: #DCF7F3;
}

.dropdown-menu>li>a:hover {
background: rgba(255,255,255,0.2);
color: #DCF7F3;
}

.navbar-default .navbar-nav>li>a {
color:#DCF7F3;
}

#main>.row {
overflow-y: scroll;
}

#main {
float: left;
}

#left {
margin-top: 30px;
}

/*Begin Buttons*/
#gc-search-box {
width: 250px;
background-color: rgba(233,236,217, 0.7);
border: none;
color: #D5DED9;
letter-spacing: 1.5px;
}

#btn-heatery, #btn-on-off, #btn-sidebar-toggle{
margin-right: 20px;
padding-left: 5px;
padding-right: 5px;
width: 145px;
}

#btn-heatery, #btn-on-off, #btn-find, #btn-sidebar-toggle, #btn-belgium, #btn-redee, #btn-pink, #btn-roots {
background-color: #4B3E4D;
color: #dcf7f3;  
border-color: transparent;
font-family: Helvetica Neue, Arial, sans-serif;
font-weight:200;
}

#btn-heatery:hover, #btn-on-off:hover, #btn-find:hover, #btn-sidebar-toggle:hover, #btn-belgium:hover, #btn-redee:hover, #btn-pink:hover, #btn-roots:hover {
background-color: #E33258;
color: #D5DED9;
border: 1px solid #D5DED9;
}


/*Start sidebar info panel*/
.panel-default {
background-color: transparent;
border-color: transparent;
}

#info_head, #info_card {
border-color: transparent;
color: #D5DED9; 
padding: 10px;
border-radius: 3px;
}

#fb_cover{
width: 100%;
padding-bottom: 10px;
}

#sb-content {
font-size: 12px;
line-height: 18px;
max-height: 175px;
overflow-y: auto;
}

#sb-title {
background-color: #B2D0DB;
color: #524204;
font-size: 14px;
font-weight: 400;
padding: 5px;
}

</style>    
    
</head>
<!-- BEGIN CONTENT -->
<body id="gc_body" style="background-color: #666;">
<nav id="hm_navbar_top" class="navbar navbar-default navbar-fixed-top">

    <div id="hm_navbar_container" class="container-fluid">

        <div id="hm_navbar_header" class="navbar-header">

            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">

                <span class="sr-only">Toggle navigation</span>

                <span class="icon-bar"></span>

                <span class="icon-bar"></span>

                <span class="icon-bar"></span>

            </button>

        </div>
        <!--/.hm_navbar_header-->

        <div id="hm_navbar_collapse" class="collapse navbar-collapse">

            <ul class="nav navbar-nav navbar-left">

                <form id="gc-form" class="navbar-form navbar-left" role="search" method="post">

                    <button id="btn-find" type="submit" class="btn btn-default">Find</button>

                    <div id="gc-input" class="form-group">

                        <input id="gc-search-box" name="address" type="text" class="form-control" placeholder="Your Hot Spot.">
                        
                        <input id="gc-search-box" name="distance" type="text" class="form-control" placeholder="Enter Search Radius.">
                        
                        <input id="gc-search-box" name="limit" type="text" class="form-control" placeholder="Enter Number of Results.">

                    </div>

                </form>

            </ul>

            <ul class="nav navbar-nav navbar-right">

                <li class="active">


                    <a href="#">Heatery Map<span class="sr-only">(current)</span></a>

                </li>

                <li>
                    <a href="https://www.heatery.io/login">Login<span class="sr-only">(login)</span></a>
                </li>

                    <li>
                        <a href="#">Circle Squared Data Labs</a>
                    </li>

                    <a id="hm_navbar_brand" class="navbar-brand" href="https://www.heatery.io">

                        <img id="hm_navbar_brand_img" alt="heatery.io" src="https://www.heatery.io/hm-media/hm-img/hm_logo_csq_lg.jpg">

                    </a>

            </ul>
            <!--/.dropdown-->

        </div>
        <!-- /.navbar-collapse -->

    </div>
    <!-- /.container-fluid -->

</nav><!-- /.navbar-default -->
<div class="container-fluid" id="main">
        <div class="row">
            <div class="col-xs-12" id="left">
                <div id="info_panel" class="panel panel-default">
                    <div id="info_card"></div>
                 </div><!--@end .panel-heading-->
            </div><!--@end .col-xs-4-->
        </div><!--@end .row-->

<?php
if($_POST){
 
    $data_arr=geocode($_POST['address']);
    $limit=($_POST['limit']);
    $distance=($_POST['distance']);

if($data_arr){
    
    $latitude=number_format($data_arr[0], 2);
    $longitude=number_format($data_arr[1], 2);
    $city=$data_arr[2];
    date_default_timezone_set("America/New_York");
    $today=date('l, F jS');
    $client_id = "LUDUFON05OQ3US4C0FT0TEKWXKSD0NHIPVGKF0TGUZGY4YUR";
    $client_secret ="F2E3NQTQKY3WS1APVGFVA31ESHW2ONNPVNJ11NPYVBV05W2I";

    
require '/Users/admin/Documents/credentials/connect.php';
$conn1 = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn1->connect_error) {
        die("Connection failed:" . $conn1->connect_error);
        exit();
        }
$version = date('Ymd');
$table=basename(__FILE__,'.php');
$name=($table.'.json');
$fp=fopen($name,'w');
$fs_url="https://api.foursquare.com/v2/venues/search?ll=" . $latitude . "," . $longitude . "&limit=50&radius=2000&categoryId=4d4b7105d754a06374d81259&client_id=$client_id&client_secret=$client_secret&v=$version";
$ch=curl_init();
curl_setopt($ch,CURLOPT_URL,$fs_url);
curl_setopt($ch,CURLOPT_FILE,$fp);
curl_exec($ch);
curl_close($ch);
$results=file_get_contents($name);
$response=json_decode($results,true);

foreach($response[response][venues] as $i){
    
    $stmt1= $conn1->prepare(
        "INSERT INTO foursquare(
        FSID, 
        fs_name, 
        fs_phone,  
        fs_reservations,
        fs_menu, 
        fs_mobile_menu, 
        fs_tips, 
        fs_checkins, 
        fs_users, 
        fs_city, 
        fs_lat, 
        fs_lng)
        VALUES
        (?,?,?,?,?,?,?,?,?,?,?,?)"); 
    
    $stmt1->bind_param("ssssssiiisdd", 
                       $FSID,
                       $fs_name,
                       $fs_phone, 
                       $fs_reservations,
                       $fs_menu, 
                       $fs_mobile_menu, 
                       $fs_tips, 
                       $fs_checkins, 
                       $fs_users, 
                       $fs_city, 
                       $fs_lat, 
                       $fs_lng);
    
    $FSID = mysqli_real_escape_string($conn1, $i['id']); 
    $fs_name = mysqli_real_escape_string($conn1, $i['name']);
    $fs_phone= mysqli_real_escape_string($conn1, $i['contact']['formattedPhone']);
    $fs_reservations= mysqli_real_escape_string($conn1, $i['reservations']['url']); 
    $fs_menu= mysqli_real_escape_string($conn1, $i['menu']['url']);    
    $fs_mobile_menu= mysqli_real_escape_string($conn1, $i['menu']['mobileUrl']);   
    $fs_tips = mysqli_real_escape_string($conn1, $i['stats']['tipCount']);   
    $fs_checkins = mysqli_real_escape_string($conn1, $i['stats']['checkinsCount']);    
    $fs_users = mysqli_real_escape_string($conn1, $i['stats']['usersCount']); 
    $fs_city = mysqli_real_escape_string($conn1, $i['location']['city']); 
    $fs_lat = mysqli_real_escape_string($conn1, $i['location']['lat']);    
    $fs_lng = mysqli_real_escape_string($conn1, $i['location']['lng']);    
    $stmt1 -> execute();
    } 
    
$stmt1->close();
$conn1->close();
 
echo 
    
    "<div class='col-md-12'>Foursquare API results for $city on $today.</div></div>";
    
            }else{
    
        }
    
    };

function geocode($address){
    $address=urlencode($address);
    $url="http://maps.google.com/maps/api/geocode/json?sensor=false&address={$address}";
    $resp_json=file_get_contents($url);
    $resp=json_decode($resp_json,true);
    
    if($resp['status']='OK'){
        $lati=$resp['results'][0]['geometry']['location']['lat'];
        $longi=$resp['results'][0]['geometry']['location']['lng'];
        $city=$resp['results']['0']['address_components']['0']['long_name'];

    if($lati&&$longi&&$city){
        $data_arr=array();
        array_push($data_arr,$lati,$longi,$city);
        return $data_arr;

}else{return false;}
}else{return false;}};


require '/Users/admin/Documents/credentials/connect.php';
    $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed:" . $conn->connect_error);
        exit();
        }
$stmt=
"SELECT 
fs_name,  
fs_phone,
fs_menu,
fs_mobile_menu,
fs_reservations,
fs_checkins,
fs_users,
fs_tips,
TRUNCATE((SQRT ( POW ( 69.1 * ( fs_lat - $latitude ), 2 ) + POW ( 69.1 * ( $longitude - fs_lng ) * COS ( fs_lat/ 57.3 ), 2 ) ) * 0.621371),2)
AS distance 
FROM foursquare 
WHERE fs_date=CURDATE()
HAVING distance < $distance
ORDER BY fs_checkins DESC LIMIT $limit";

if($result=$conn->query($stmt)){

    $fs_name=$fs_phone=$fs_menu=$fs_mobile_menu=$fs_reservations=$fs_checkins=$fs_users=$fs_tips=array();

    $c=0;

    while ($obj=$result->fetch_object()){
        
        $fs_name[$c]=(stripslashes($obj->fs_name));
        
        $fs_phone[$c]=$obj->fs_phone;
        
        $fs_menu[$c]=$obj->fs_menu;
        
        $fs_menu_parse[$c]=(parse_url($obj->fs_menu, PHP_URL_HOST));
        
        $fs_mobile_menu[$c]=$obj->fs_mobile_menu;
        
        $fs_mobile_menu_parse[$c]=(parse_url($obj->fs_mobile_menu, PHP_URL_HOST));
        
        $fs_reservations[$c]=$obj->fs_reservations;
        
        $fs_reservations_parse[$c]=(parse_url($obj->fs_reservations, PHP_URL_HOST));
        
        $fs_checkins[$c]=(number_format($obj->fs_checkins, 0, null, ','));
        
        $fs_users[$c]=(number_format($obj->fs_users, 0, null, ','));
        
        $fs_tips[$c]=(number_format($obj->fs_tips, 0, null, ','));
        
        ++$c;
    }
    
    $result->close();
}
    $conn->close();

for ( $i = 0; $i < $c; $i++ ) {
    
        $j = $i + 1; 
    
            echo "var fs_name$i = \"$fs_name[$i]\"; \n";
            echo "var fs_phone$i = \"$fs_phone[$i]\"; \n";
            echo "var fs_menu$i = \"$fs_menu[$i]\";\n";
            echo "var fs_mobile_menu$i = \"$fs_mobile_menu[$i]\";\n";
            echo "var fs_reservations$i = \"$fs_reservations[$i]\";\n";
            echo "var fs_checkins$i = \"$fs_checkins[$i]\";\n";
            echo "var fs_users$i = \"$fs_users[$i]\";\n";
            echo "var fs_tips$i = \"$fs_tips[$i]\";\n";
            echo "var infoCard$i = 
            
<div class=\"container\">

    <div class=\"row\">
    
        <div id=\"sb-title\" class=\"col-xs-12\">
        
           $j.&nbsp;$fs_name[$i]</div></div>
            
            <div class=\"row\">
    
                <div id=\"sb-title\" class=\"col-xs-12\">
        
                    $fs_phone[$i]</div></div>
                
                <div class=\"row\">
                
                    <div id=\"sb-title\" class=\"col-xs-12\">
                    
<a id=\"sb_link\" href=$fs_menu[$i]>The Menu @&nbsp;$fs_name[$i]</a></div></div>


    <div class=\"row\">
        <div id=\"sb-title\" class=\"col-xs-12\">
<a id=\"sb_link\" href=$fs_mobile_menu[$i]>Mobile Menu</a></div></div>


   <div class=\"row\">
        <div id=\"sb-title\" class=\"col-xs-12\">
<a id=\"sb_link\" href=$fs_reservations[$i]>Reservations through Open Table @&nbsp;$fs_name[$i]</a></div></div>


<div id=\"iw_content\" class=\"container-fluid\">
            
<table id= \"info_table\" class=\"table-striped table-hover table-bordered table-condensed table-responsive\">
            
            <thead>
            
            <tr>
            
            <th>Users</th> 
            
            <th>Checkins</th> 
            
            <th>Tips</th> 
            
            </tr> </thead>  
            
            <tbody> 
            
            <td>$fs_users[$i]</td> 
            
            <td>$fs_checkins[$i]</td> 
            
            <td>$fs_tips[$i]</td>  
            
            </tbody> 
            
            </table>
                </div>  
                    <div class=\"iw-bottom-gradient\">
                        </div>
                            </div> \n";



            
echo "$('#info_card').append(infoCard$i);\n";
    
        }
   
?>
               

    </div><!--@end .container-->
</body>
</html>