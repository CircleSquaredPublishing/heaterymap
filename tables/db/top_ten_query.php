<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "root";
$dbname = "heateryLocal";
	
//Connect to MySQL Server
$link=mysqli_connect($dbhost, $dbuser, $dbpass);
	
//Select Database
mysqli_select_db($link, 'heateryLocal') or die(mysqli_error($link));
	
// Retrieve data from Query String
$likes = $_GET['likes'];
$tac = $_GET['tac'];
$zip = $_GET['zip'];
$date= $_GET['datepicker'];


// Escape User Input to help prevent SQL Injection
$likes = mysqli_real_escape_string($link, $likes);
$tac = mysqli_real_escape_string($link, $tac);
$zip  = mysqli_real_escape_string($link, $zip);
$date = mysqli_real_escape_string($link, $date);

echo $date;

//build query
$query = "SELECT DISTINCT fbname, zip, likes, talking_about_count, street, entryDate FROM fbraw 
WHERE zip = $zip";

if(is_numeric($likes))
   $query .= " AND likes >= $likes";

if(is_numeric($tac))
   $query .= " AND talking_about_count >= $tac";

    $query .= " AND entryDate = '$date' ";

    $query .= " ORDER BY talking_about_count DESC";
	
//Execute query
$qry_result = mysqli_query($link, $query) or die(mysqli_error($link));

//Build Result String
$display_string = "<div class='table-repsonsive'>";
$display_string = "<table class='table table-striped table-bordered table-hover table-condensed'>";
$display_string .= "<tr>";
$display_string .= "<th>Restaurant</th>";
$display_string .= "<th>Likes</th>";
$display_string .= "<th>Talking About</th>";
//$display_string .= "<th>Address</th>";
$display_string .= "<th>Reporting Date</th>";
$display_string .= "</tr>";

// Insert a new row in the table for each person returned
while($row = mysqli_fetch_array($qry_result)){
   $display_string .= "<tr>";
   $display_string .= "<td>$row[fbname]</td>";
   $display_string .= "<td>$row[likes]</td>";
   $display_string .= "<td>$row[talking_about_count]</td>";
   //$display_string .= "<td>$row[street]</td>";
   $display_string .= "<td>$row[entryDate]</td>";
   $display_string .= "</tr>";
}

echo "Query: " . ($query) . "<br />";
$display_string .= "</table>";
$display_string .= "</div>";

echo stripslashes($display_string);
?>