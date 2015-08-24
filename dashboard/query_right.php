<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "root";
$dbname = "social_data";
	
//Connect to MySQL Server
$link=mysqli_connect($dbhost, $dbuser, $dbpass);
	
//Select Database
mysqli_select_db($link, 'social_data') or die(mysqli_error($link));
	
// Retrieve data from Query String
$likes = $_GET['likes_right'];
$tac = $_GET['tac_right'];
$zip = $_GET['zip_right'];
$date= $_GET['datepicker_right'];


// Escape User Input to help prevent SQL Injection
$likes = mysqli_real_escape_string($link, $likes);
$tac = mysqli_real_escape_string($link, $tac);
$zip  = mysqli_real_escape_string($link, $zip);
$date = mysqli_real_escape_string($link, $date);
$date1 = date_create(mysqli_real_escape_string($link, $date));

date_default_timezone_set('America/New_York');
$today = date('l, F jS');
$time = date("h:i a");

echo 'Data Collected:&nbsp;' . (date_format($date1, 'l, F jS')) . '<br>' 
    . 'Data Presented:&nbsp;' . $today . '<br>';
echo 'Request Delivered:&nbsp;' . $time . '.';

//build query
$query = "SELECT DISTINCT fb_name, fb_likes, fb_talking_about FROM top10_markers
WHERE fb_zip = $zip";

if(is_numeric($likes))
   $query .= " AND fb_likes >= $likes";

if(is_numeric($tac))
   $query .= " AND fb_talking_about >= $tac";

    $query .= " AND fb_date = '$date' ";

    $query .= " ORDER BY fb_talking_about DESC LIMIT 20";
	
//Execute query
$qry_result = mysqli_query($link, $query) or die(mysqli_error($link));

//Build Result String
$display_string = "<div class='table-repsonsive'>";
$display_string = "<table class='table table-striped table-bordered table-hover table-condensed'>";
$display_string .= "<tr>";
$display_string .= "<th>Restaurant</th>";
$display_string .= "<th>Likes</th>";
$display_string .= "<th>Talking About</th>";
$display_string .= "</tr>";

// Insert a new row in the table for each person returned
while($row = mysqli_fetch_array($qry_result)){
   $display_string .= "<tr>";
   $display_string .= "<td>$row[fb_name]</td>";
   $display_string .= "<td>$row[fb_likes]</td>";
   $display_string .= "<td>$row[fb_talking_about]</td>";
   $display_string .= "</tr>";
}

$display_string .= "</table>";
$display_string .= "</div>";

echo stripslashes($display_string);
?>